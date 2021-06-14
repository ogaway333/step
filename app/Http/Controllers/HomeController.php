<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Step;
use Auth;
use App\UserChallenge;

//ユーザーのホーム画面の制御
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //ユーザーのホーム画面の表示
    public function index()
    {
        $user = new User;
        $auth = Auth::user();

        //ログイン状態でなければtopページ
        if(empty($auth)){
            return view('top');
        }

        //ログイン状態だがメール未認証の場合はメール認証ページ
        if(!empty($auth) && empty(optional($auth)->email_verified_at)){
            return view('auth.verify');
        }

        $steps = Step::where('user_id', $auth->id)->orderBy('created_at', 'desc')->paginate(6);

        $user_challenges = UserChallenge::where('challenger_id', Auth::id())->get();

        return view('home', compact('auth', 'steps', 'user_challenges'));
    }
}
