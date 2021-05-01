<?php

namespace App\Http\Controllers\StepChild;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Step;
use App\StepChild;
use Auth;

class RegisterController extends Controller
{
    public function index($id) {
        $step = Step::find($id);
        // GETパラメータの確認
        // 数字ではない、または編集者のidとstepのユーザーidが一致しなかった場合のリダイレクト処理
        if(!ctype_digit($id) || Auth::id() != optional($step)->user_id){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }
        return view('mystep_child.register', compact('step'));
    }

    //stepの登録
    public function register($id, Request $request) {
        $step = Step::find($id);
        // GETパラメータの確認
        // 数字ではない、または編集者のidとstepのユーザーidが一致しなかった場合のリダイレクト処理
        if(!ctype_digit($id) || Auth::id() != optional($step)->user_id){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }

        $request->validate([
            'title'=>['required','string','max:100'],
            'content'=>['required','string','max:5000'],
        ]);
        $step_child = new StepChild($request->all());
        $step_child->step_id = $id;
        $step_child->save();    
        return redirect('mystep/manage/'.$step->id, 301)->with('flash_message', '子STEPが投稿されました');
            
    }
}
