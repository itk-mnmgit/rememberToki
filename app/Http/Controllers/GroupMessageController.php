<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GroupPosted;
use App\Group;
use App\GroupChatMessage;

class GroupMessageController extends Controller
{
    public function create(Request $request)
    {
        $post = new GroupChatMessage($request->all());
        $post->save();
        event(new GroupPosted($post));

        return response()->json(['message' => '投稿しました。']);
    }
}
