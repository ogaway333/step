<?php

namespace App\Http\Controllers\Step;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Step;
use App\StepChild;
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
            'tag_name1'=>['nullable','string','max:10'],
            'tag_name2'=>['nullable','string','max:10'],
            'tag_name3'=>['nullable','string','max:10'],
            'content'=>['required','string','max:5000'],
            'title_children.*'=>['required','string','max:100'],
            'clear_times.*'=>['required','integer','digits_between:1,3'],
            'content_children.*'=>['required','string','max:5000'],
        ]);
        $step = new Step($request->except(['title_children', 'content_children']));
        $step->user_id = Auth::id();
        $step->save();

        $data = array();

        for($i = 0; $i < count($request->title_children); $i++){
            $data[$i]['title'] =  $request->title_children[$i];
            $data[$i]['clear_time'] =  $request->clear_times[$i];
            $data[$i]['content'] =  $request->content_children[$i];
            $data[$i]['step_id'] =  $step->id;
            $data[$i]['created_at'] =  now();
            $data[$i]['updated_at'] =  now();

        }

        $step_children = new StepChild();

        $step_children->insert($data);

        return redirect('mystep/manage/'.$step->id, 301)->with('flash_message', 'STEPが投稿されました');
            
    }
}