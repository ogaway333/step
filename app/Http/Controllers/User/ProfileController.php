<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index($id)
    {
        // GETパラメータの確認 数字であるか
        if(!ctype_digit($id)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }
        $user = User::where('id', $id)->first();
        
        // GETパラメータの確認 ユーザー情報があるか
        if(empty($user)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }

        $steps = $user ? $user->steps()->where('user_id', $user->id)->get() : null;

        return view('user.profile', compact('user','steps'));
    }
}
