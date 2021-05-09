<?php

namespace App\Http\Controllers\Step;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Step;
use App\UserChallenge;
use App\StepChildClear;
use Auth;

//子ステップ詳細画面の制御
class DetailChildController extends Controller
{
    //子ステップ詳細画面の表示
    public function index($step_id, $step_child_id) {
        // GETパラメータの確認 数字であるか
        if(!ctype_digit($step_id) || !ctype_digit($step_child_id)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }
        $step = Step::where('id', $step_id)->where('show_flg', true)->first();
        $step_child = $step ? $step->step_children()->find($step_child_id) : null;
        // GETパラメータの確認 stepとstep_childがnullか
        if(empty($step) || empty($step_child)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }
        $uc = UserChallenge::where('step_id', $step_id)->where('challenger_id', Auth::id())->first();
        $step_clear = $uc ? $uc->step_child_clears()->where('step_child_id', $step_child_id)->first() : null;
        return view('step.detail_child', compact('step_child', 'uc', 'step_clear'));
    }

    //子ステップのクリア処理
    public function clear($step_id, $step_child_id) {
        // GETパラメータの確認 数字であるか
        if(!ctype_digit($step_id) || !ctype_digit($step_child_id)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }
        $uc = UserChallenge::where('step_id', $step_id)->where('challenger_id', Auth::id())->first();
        $step_clear = new StepChildClear();
        $step_clear->challenge_id = $uc->id;
        $step_clear->step_child_id = $step_child_id;

        $step_clear->save();
        

        return redirect('/step/'.$step_id, 301)->with('flash_message', '子STEPをクリアしました！');

    }

    //子ステップの削除
    public function delete($step_id, $step_child_id) {
        // GETパラメータの確認 数字であるか
        if(!ctype_digit($step_id) || !ctype_digit($step_child_id)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }
        $uc = UserChallenge::where('step_id', $step_id)->where('challenger_id', Auth::id())->first();

        $step_clear = StepChildClear::where('challenge_id', $uc->id)->where('step_child_id', $step_child_id);

        DB::transaction(function () use ($step_clear) {
            $step_clear->delete();
        });

        return redirect('/step/'.$step_id, 301)->with('flash_message', 'STEPのクリアをキャンセルしました');

    }
}
