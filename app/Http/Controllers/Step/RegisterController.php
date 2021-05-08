<?php

namespace App\Http\Controllers\Step;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Step;
use Auth;


//step登録画面の制御
class RegisterController extends Controller
{
    //step登録画面の表示
    public function index() {
        $categories = Category::all();
        return view('mystep.register', compact('categories'));
    }

    //stepの登録
    public function register(Request $request) {
        $request->validate([
            'title'=>['required','string','max:100'],
            'category_id' =>['required','integer','exists:categories,id'],
            'clear_time'=>['required','string','max:10'],
            'tag_name1'=>['nullable','string','max:10'],
            'tag_name2'=>['nullable','string','max:10'],
            'tag_name3'=>['nullable','string','max:10'],
            'content'=>['required','string','max:5000'],
        ]);
        $step = new Step($request->all());
        $step->user_id = Auth::id();
        $step->save();    
        return redirect('mystep/manage/'.$step->id, 301)->with('flash_message', 'STEPが投稿されました');
            
    }
}