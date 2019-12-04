<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Genre;
use Illuminate\Support\Facades\Auth;
use DateTime;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $genres = Genre::all();
        return view('event.index', ['events' => $events, 'genres' => $genres]);
    }

    public function toMakeEvent()
    {
        $genres = Genre::all();
        return view('event.makeEvent', ['genres' => $genres]);
    }

    public function confirmEvent(Request $request)
    {
        $event = new Event();

        $imgPath = $this->saveProfileImage($request->img);

        //新しく作るグループ内容を受け取る
        $event->name = $request->name;
        $event->genre_id = $request->genre_id;
        $event->user_id = Auth::user()->id;
        $event->img = $imgPath;
        $event->intro = $request->intro;

        $event->startTime = new DateTime($request->date . ' ' . $request->time);

        $event->save();

        //chat/confirmへ
        return view('event.confirm', ['event' => $event]);
    }
    public function makeEvent(Request $request)
    {
        $event = new Event();

        $imgPath = $this->saveProfileImage($request->img);

        //新しく作るグループ内容を受け取る
        $event->name = $request->name;
        $event->genre_id = $request->genre_id;
        $event->user_id = Auth::user()->id;
        $event->img = $imgPath;
        $event->intro = $request->intro;

        $event->startTime = new DateTime($request->date . ' ' . $request->time);

        $event->save();

        return redirect()->route('get.chat.index');
    }

    private function saveProfileImage($image)
    {
        //storage/public/images/profilePictureに絶対に被らない名前で保存してくれる
        //保存した後、そのファイルまでのパスを返してくれる
        $imgPath = $image->store('images/profilePicture', 'public');

        return 'storage/' . $imgPath;
    }

}
