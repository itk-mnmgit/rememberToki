<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('home');
    }
    public function thanks()
    {
        return view('thanks');
    }

    public function storeDeteil(Request $request)
    {
        //img,intro 等を保存
        //DB(users)のカラムにrequestで得た奴らをぶち込む
        $user = Auth::user();
        $user->img = $request->img;
        //DBに保存
        $user->save();

        //mine.phpに帰る
        return view('mine');
    }

    public function toMine()
    {
        return view('mine');
    }

}
