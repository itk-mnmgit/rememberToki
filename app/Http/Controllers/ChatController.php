<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function index()
    {
        return view('chat.mine');
    }


    public function toGroup()
    {
        return view('chat.group');
    }
}
