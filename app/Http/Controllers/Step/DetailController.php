<?php

namespace App\Http\Controllers\Step;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Step;
use App\UserChallenge;
use App\StepChildClear;
use Auth;

class DetailController extends Controller
{
    public function index($id) {
        // GETパラメータの確認 数字であるか
        if(!ctype_digit($id)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }
        $uc = UserChallenge::where('step_id', $id)->where('challenger_id', Auth::id())->first();
        $step = Step::where('id', $id)->where('show_flg', true)->first();
        // GETパラメータの確認 stepとstep_childがnullか
        if(empty($step)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }


        $step_children = $step ? $step->step_children()->get() : null;

        return view('step.detail', compact('step', 'step_children', 'uc'));
    }


    public function start($id) {
        $uc = new UserChallenge();
        $uc->challenger_id = Auth::id();
        $uc->step_id = $id;

        $step = Step::where('id', $id)->where('show_flg', true)->first();
        // GETパラメータの確認
        // 数字ではない、または編集者のidとstepのユーザーidが一致しなかった場合のリダイレクト処理
        if(!ctype_digit($id) || empty($step)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }

        DB::transaction(function () use ($uc, $step) {
            $uc->save();
            $step->increment('challenger_count', 1);
        });

        return redirect('/home', 301)->with('flash_message', 'STEPのチャレンジが始まりました！');

    }

    //ユーザーのステップのチャレンジを削除
    public function delete($id) {
        // GETパラメータの確認
        // 数字ではない
        if(!ctype_digit($id)){
            return back()->withInput()->with('flash_message', 'パラメータが不正です');
        }
        $uc = UserChallenge::where('step_id', $id)->where('challenger_id', Auth::id())->first();

        $step_clears = StepChildClear::where('challenge_id', $uc->id);

        DB::transaction(function () use ($uc, $step_clears) {
            $uc->delete();
            $step_clears->delete();
        });

        return redirect('/home', 301)->with('flash_message', 'STEPのチャレンジを諦めました');

    }
}
