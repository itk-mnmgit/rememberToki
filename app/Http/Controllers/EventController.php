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
        $events = Event::all();
        $genres = Genre::all();
        return view('event.index', ['events' => $events, 'genres' => $genres]);
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
    //ユーザーが引数のグループに参加しているかどうかを返す
    public function checkEvent(Request $request)
    {
        //$requestで event_id 取ってきて それと一致するイベントを$eventに格納
        $event = EventUser::where('id', $request->id);
        //ログインuser_id が 取ってきたイベントのuser_id のなかにあれば true
        if(Auth::user()->id == $event->user_id){
            return true;
        }else{
            return false;
        }
    }

    public function leaveEvent(Request $request)
    {
        // 退会するボタンが押押されたイベントのidとログイン中のユーザーidと一致するカラムを取ってくる
        $leaveEvent = EventUser::where('id', $request->id)->where('user_id', Auth::user()->id);

        //削除
        $leaveEvent->delete();

        //まとめられへんやんな？↑

        return redirect()->route('get.chat.index');
    }


}
