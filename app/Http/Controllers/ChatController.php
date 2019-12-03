<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Group;
use App\Genre;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function index()
    {
        return view('chat.index');
    }

    public function toListGroup()
    {
        return view('chat.listGroup');
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

        //新しく作るグループ内容を受け取る
        $group->name = $request->name;
        $group->genre_id = $request->genre_id;
        $group->user_id = Auth::user()->id;
        $group->img = $imgPath;
        $group->intro = $request->intro;

        $group->save();

        //chat/confirmへ
        return view('chat.confirm', ['group' => $group]);
    }
    public function makeGroup(Request $request)
    {
        $group = new Group();

        $imgPath = $this->saveProfileImage($request->img);

        //新しく作るグループ内容を受け取る
        $group->name = $request->name;
        $group->genre_id = $request->genre_id;
        $group->user_id = Auth::user()->id;
        $group->img = $imgPath;
        $group->intro = $request->intro;

        $group->save();

        return redirect()->route('get.chat.index', ['group' => $group]);
    }

    private function saveProfileImage($image)
    {
        //storage/public/images/profilePictureに絶対に被らない名前で保存してくれる
        //保存した後、そのファイルまでのパスを返してくれる
        $imgPath = $image->store('images/profilePicture', 'public');

        return 'storage/' . $imgPath;
    }


}
