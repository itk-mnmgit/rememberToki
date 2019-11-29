<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $imgPath = $this->saveProfileImage($request->img);

        //img,intro 等を保存
        //DB(users)のカラムにrequestで得た奴らをぶち込む
        $user = Auth::user();
        $user->img = $imgPath;

        //DBに保存
        $user->save();

        //mine.phpに帰る
        return view('mine');
    }

    //profile画像を保存するためのメソッド
    //引数 : $image : 保存したい画像
    private function saveProfileImage($image)
    {
        //storage/public/images/profilePictureに絶対に被らない名前で保存してくれる
        //保存した後、そのファイルまでのパスを返してくれる
        $imgPath = $image->store('images/profilePicture', 'public');

        return 'storage/' . $imgPath;
    }






}
