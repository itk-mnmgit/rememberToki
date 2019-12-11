<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('home.index');
    }
    public function thanks()
    {
        return view('home.thanks');
    }

    public function storeDetail(Request $request)
    {
        //img,intro 等を保存
        //DB(users)のカラムにrequestで得た奴らをぶち込む
        $user = Auth::user();
        $user->img = $request->base64;
        $user->intro = $request->intro;


        //DBに保存
        $user->save();

        //chat.index.phpに帰る
        $groups = Group::all();
        return redirect()->route('post.chat.index');
    }

}
