<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;


//パスワード変更処理の制御
class PasswordController extends Controller
{
    public function index() {
        return view('user.password');
    }

    //ユーザー情報の更新
    public function update(Request $request) {
        $request->validate([
            'password_old' => ['required', 'regex:/^[a-zA-Z\d]+$/', 'string', 'min:8', 'max:255'],
            'password' => ['required', 'regex:/^[a-zA-Z\d]+$/', 'string', 'min:8', 'max:255', 'confirmed'],
        ]);
        $user = new User;
        $auth = Auth::user();

        if (Hash::check($request->password_old, $auth->password)) {
            $user->where('id', $auth->id)->update([
                'password' => Hash::make($request->password)
            ]);          
            return redirect('/home', 301);  
        } else {
            return redirect('/user/withdrawal', 301)->with('warning', 'パスワードが違います');  
        }                
    }
}
