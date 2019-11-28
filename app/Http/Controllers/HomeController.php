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

    public function storeDeteil()
    {
        //img,intro 等を保存
        //save();みたいなやつ
        //mine.phpに帰る
        return view('mine');
    }

}
