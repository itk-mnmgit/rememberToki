<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('event.index', ['events' => $events]);
    }

    public function toMakeEvent()
    {
        return view('event.makeEvent');
    }

    public function confirmEvent(Request $request)
    {
        $event = new Event();

        //新しく作るグループ内容を受け取る
        $event->name = $request->name;
        $event->tag_id = $request->tag_id;
        $event->user_id = Auth::user()->id;

        //chat/confirmへ
        return view('event.confirm');
    }
    public function makeEvent(Request $request)
    {
        $event = new Event();

        //新しく作るグループ内容を受け取る
        $event->name = $request->name;
        $event->tag_id = $request->tag_id;
        $event->user_id = Auth::user()->id;
        //DBに保存
        $event->save();
        //chat/confirmへ
        return redirect()->route('get.chat.index');
    }

}
