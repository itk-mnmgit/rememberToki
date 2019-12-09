<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Group;
use App\Genre;
use App\User;
use App\Dm;
use App\UserGroup;
use App\EventUser;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function index()
    {
        $attendEvents = EventUser::where('user_id', Auth::user()->id)->with('event')->get();
        $attendGroups = UserGroup::where('user_id', Auth::user()->id)->with('group')->get();

        $genres = Genre::all();
        $dms = Dm::getDm(Auth::user()->id);

        return view('chat.index', ['attendEvents' => $attendEvents, 'genres' => $genres, 'attendGroups' => $attendGroups, 'dms' => $dms]);
    }

    public function toListGroup()
    {
        $groups = Group::all();
        $genres = Genre::all();

        $user_id = Auth::user()->id;
        $attendGroups = UserGroup::where('user_id', $user_id)->get(['group_id'])->toArray();
        if(!isset($attendGroups[0])) {
            $attendGroups[0] = [];
        }

        return view('chat.listGroup', ['genres' => $genres, 'groups' => $groups, 'attendGroupsId' => $attendGroups[0]]);
    }

    public function searchGroup(Request $request)
    {
        if($request->selected_genre==0){
            $groups = Group::all();
        }else{
            $groups = Group::where('genre_id', $request->selected_genre)->get();
        }
        $genres = Genre::all();

        $user_id = Auth::user()->id;
        $attendGroups = UserGroup::where('user_id', $user_id)->get(['group_id'])->toArray();
        if(!isset($attendGroups[0])) {
            $attendGroups[0] = [];
        }

        return view('chat.listGroup', ['groups' => $groups, 'genres' => $genres, 'attendGroupsId' => $attendGroups[0]]);
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

    public function attendGroup(Request $request)
    {
        $user_Group = new UserGroup();

        $user_Group->group_id = $request->id;
        $user_Group->user_id = Auth::user()->id;

        $user_Group->save();

        return redirect()->route('get.chat.index');
    }

    public function leaveGroup(Request $request)
    {
        // 退会するボタンが押押されたイベントのidとログイン中のユーザーidと一致するカラムを取ってくる
        $leaveGroup = UserGroup::where('group_id', $request->id)->where('user_id', Auth::user()->id);

        //削除
        $leaveGroup->delete();

        return redirect()->route('get.chat.index');
    }


    // ---------- ここから下はDM用 ------------




}
