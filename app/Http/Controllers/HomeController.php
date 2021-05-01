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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = new User;
        $auth = Auth::user();

        $steps = Step::where('user_id', $auth->id)->get();
        $user_challenges = UserChallenge::where('challenger_id', Auth::id())->get();


        return view('home', compact('auth','steps', 'user_challenges'));
    }
}
