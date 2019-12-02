<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index');
    }

    public function confirmProfile()
    {
        //プロフィール変更をrequestで受け取る

        //setting/confirmを返す
        return view('setting.confirmProfile');
    }

    public function changeProfile()
    {
        //プロフィール変更をrequestで受け取る

        //DBに保存

        //my pageへ
        return redirect()->route('chat.index');
    }

    public function help()
    {
        return view('setting.help');
    }

    public function confirmHelp()
    {
        //お問い合わせ内容をrequestで受け取る

        //setting/confirmHelpを返す
        return view('setting.confirmHelp');
    }

    public function sendHelp()
    {
        //お問い合わせ内容をrequestで受け取る

        //my pageへ
        return redirect()->route('chat.index');
    }
}
