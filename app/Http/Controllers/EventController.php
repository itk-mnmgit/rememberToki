<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Genre;
use App\User;
use App\EventUser;
use Illuminate\Support\Facades\Auth;
use DateTime;

class EventController extends Controller
{   public function modal()
    {
        return view('event.modalTrial');
    }


    public function index()
    {
        $user_id = Auth::user()->id;
        $events = Event::all();
        $genres = Genre::all();
        $attendEvents = EventUser::where('user_id', $user_id)->get(['event_id'])->toArray();
        if(!isset($attendEvents[0])) {
            $attendEvents[0] = [];
        }
        return view('event.index', ['events' => $events, 'genres' => $genres, 'attendEventsId' => $attendEvents[0]]);
    }

    public function searchEvent(Request $request)
    {
        if($request->selected_genre==0){
            $events = Event::all();
        }else{
            $events = Event::where('genre_id', $request->selected_genre)->get();
        }
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

        $imgPath = $this->saveEventImage($request->img);

        $event->name = $request->name;
        $event->genre_id = $request->genre_id;
        $event->user_id = Auth::user()->id;
        $event->img = $imgPath;
        $event->intro = $request->intro;

        $event->startTime = new DateTime($request->date . ' ' . $request->time);

        $genre = Genre::find($event->genre_id);
        $user = User::find($event->user_id);

        $request->session()->put('event', $event);

        return view('event.confirm', ['event' => $event,'genre' => $genre, 'user' => $user]);
    }

    public function makeEvent(Request $request)
    {
        $event = $request->session()->get('event');

        $event->save();

        $request->session()->forget('event');

        return redirect()->route('get.chat.index');
    }

    private function saveEventImage($image)
    {
        //storage/public/images/eventに絶対に被らない名前で保存してくれる
        //保存した後、そのファイルまでのパスを返してくれる
        $imgPath = $image->store('images/event', 'public');

        return 'storage/' . $imgPath;
    }

    public function attendEvent(Request $request)
    {
        $event_User = new EventUser();

        $event_User->event_id = $request->id;
        $event_User->user_id = Auth::user()->id;

        $event_User->save();

        return redirect()->route('get.chat.index');
    }

    public function leaveEvent(Request $request)
    {
        // 退会するボタンが押押されたイベントのidとログイン中のユーザーidと一致するカラムを取ってくる
        $leaveEvent = EventUser::where('event_id', $request->id)->where('user_id', Auth::user()->id);
        // EventUser::where('id', $request->id)->where('user_id', Auth::user()->id)->delete();

        //削除
        $leaveEvent->delete();

        //まとめられへんやんな？↑

        return redirect()->route('get.chat.index');
    }


}
