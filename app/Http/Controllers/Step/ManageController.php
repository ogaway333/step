<?php

namespace App\Http\Controllers\Step;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Step;
use App\StepChild;
use Auth;

class ManageController extends Controller
{
    public function index($id) {
        $step = Step::find($id);
        // GETパラメータの確認
        // 数字ではない、または編集者のidとstepのユーザーidが一致しなかった場合のリダイレクト処理
        if(!ctype_digit($id) || Auth::id() != optional($step)->user_id){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }

        $step_children = StepChild::where('step_id', $id)->get();
        return view('mystep.manage', compact('step', 'step_children'));
    }

    public function show($id) {
        $step = Step::find($id);
        // GETパラメータの確認
        // 数字ではない、または編集者のidとstepのユーザーidが一致しなかった場合のリダイレクト処理
        if(!ctype_digit($id) || Auth::id() != optional($step)->user_id){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }
        $step->show_flg = true;
        $step->save();
        return redirect('mystep/manage/'.$step->id, 301)->with('flash_message', 'STEPが公開されました');
    }

}
