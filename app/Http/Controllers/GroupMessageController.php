<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GroupPosted;
use App\Group;
use App\GroupChatMessage;
use Carbon\Carbon;

class GroupMessageController extends Controller
{
    public function create(Request $request)
    {
        $post = new GroupChatMessage();
        $post->group_chat_id = 1;
        $post->text = $request->text;
        $post->user_id = 1;
        $sent_time = Carbon::now();

        $post->save();
        event(new GroupPosted($post));

        return response()->json(['message' => '投稿しました。']);
    }
}
