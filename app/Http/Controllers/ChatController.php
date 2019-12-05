<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Group;
use App\Genre;
use App\User;
use App\Dm;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function index()
    {
        $events = Event::all();
        $groups = Group::all();
        $genres = Genre::all();
        $dms = Dm::getDm(Auth::user()->id);
        // $users = User::where('user_id', $dms->user1_id)->orWhere('user_id', $dms->user2_id);

        return view('chat.index', ['events' => $events, 'genres' => $genres, 'groups' => $groups, 'dms' => $dms]);
    }

    public function toListGroup()
    {
        $groups = Group::all();
        $genres = Genre::all();
        return view('chat.listGroup', ['genres' => $genres, 'groups' => $groups]);
    }

    public function toMakeGroup()
    {
        $genres = Genre::all();
        return view('chat.makeGroup', ['genres' => $genres]);
    }

    public function confirmGroup(Request $request)
    {
        $group = new Group();

        $imgPath = $this->saveProfileImage($request->img);

        $group->name = $request->name;
        $group->genre_id = $request->genre_id;
        $group->user_id = Auth::user()->id;
        $group->img = $imgPath;
        $group->intro = $request->intro;

        $genre = Genre::find($group->genre_id);
        $user = User::find($group->user_id);

        $request->session()->put('group', $group);

        return view('chat.confirm', ['group' => $group, 'genre' => $genre, 'user' => $user]);
    }

    public function makeGroup(Request $request)
    {
        $group = $request->session()->get('group');

        $group->save();

        return redirect()->route('get.chat.index');
    }

    private function saveProfileImage($image)
    {
        //storage/public/images/profilePictureに絶対に被らない名前で保存してくれる
        //保存した後、そのファイルまでのパスを返してくれる
        $imgPath = $image->store('images/profilePicture', 'public');

        return 'storage/' . $imgPath;
    }

    // ---------- ここから下はDM用 ------------




}
