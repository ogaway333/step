<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

//ユーザーの退会画面の制御
class WithdrawalController extends Controller
{
    //退会画面の表示
    public function index() {
        $user = Auth::user();

        return view('user.withdrawal');
    }

    //ユーザー情報の削除
    public function delete(Request $request) {
        $request->validate([
            'password' => ['required', 'regex:/^[a-zA-Z\d]+$/', 'string', 'min:8', 'max:255']
        ]);
        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            $user_challenges = $user ? $user->user_challenges()->where('challenger_id', $user->id)->get() : null;

            $steps = $user ? $user->steps()->where('user_id', $user->id)->get() : null;
            
            DB::transaction(function () use ($user, $steps, $user_challenges) {
                foreach($user_challenges as $user_challenge){
                    $step_child_clears = $user_challenge ? $user_challenge->step_child_clears()->where('challenge_id', $user_challenge->id)->get() : null;
                    foreach($step_child_clears as $step_child_clear){
                        $step_child_clear->delete();
                    }
                    $user_challenge->delete();
                }
                foreach($steps as $step) {
                    $step_children = $step ? $step->step_children()->where('step_id', $step->id)->get() : null;
                    foreach($step_children as $step_child){
                        $step_child->delete();
                    }
                    $step->delete();
                }
            });
            $user->delete();
    
            return redirect('/', 301)->with('flash_message', '退会しました');

        } else {
            return back()->withInput()->with('flash_message_err', 'パスワードが不正です');  
        }


    }
}
