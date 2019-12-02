<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Group;
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
        return view('chat.makeGroup');
    }
    public function confirmGroup(Request $request)
    {
        $group = new Group();

        //新しく作るグループ内容を受け取る
        $group->name = $request->name;
        $group->tag_id = $request->tag_id;
        $group->user_id = Auth::user()->id;
        //chat/confirmへ
        return view('chat.confirm');
    }
    public function makeGroup(Request $request)
    {
        $group = new Group();

        //新しく作るグループ内容を受け取る
        $group->name = $request->name;
        $group->tag_id = $request->tag_id;
        //DBに保存
        $group->save();

        //chat/confirmへ
        return redirect()->route('get.chat.index');
    }


}
