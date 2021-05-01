<?php

namespace App\Http\Controllers\StepChild;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Step;
use App\StepChild;
use Auth;

class EditController extends Controller
{
    public function index($step_id, $step_child_id) {
        // GETパラメータの確認 数字であるか
        if(!ctype_digit($step_id) || !ctype_digit($step_child_id)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }
        $step = Step::find($step_id);
        $step_child = $step ? $step->step_children->find($step_child_id) : null;

        // GETパラメータの確認　編集者のidとstepのユーザーidの整合性
        if(Auth::id() != optional($step)->user_id || optional($step)->id != optional($step_child)->step_id){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }

        return view('mystep_child.edit', compact('step','step_child'));
    }

    //子stepの更新
    public function update($step_id, $step_child_id, Request $request) {
        // GETパラメータの確認 数字であるか
        if(!ctype_digit($step_id) || !ctype_digit($step_child_id)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }

        $step = Step::find($step_id);
        $step_child = $step->step_children->find($step_child_id);
        
        // GETパラメータの確認　編集者のidとstepのユーザーidの整合性
        if(Auth::id() != optional($step)->user_id || optional($step)->id != optional($step_child)->step_id){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }

        $request->validate([
            'title'=>['required','string','max:100'],
            'content'=>['required','string','max:5000']
        ]);
        
        StepChild::find($step_child_id)->fill($request->all())->save();
        return redirect('mystep/manage/'.$step->id, 301)->with('flash_message', '子STEPが更新されました');
            
    }

    //子stepの削除
    public function delete($step_id, $step_child_id) {
        // GETパラメータの確認 数字であるか
        if(!ctype_digit($step_id) || !ctype_digit($step_child_id)){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }

        $step = Step::find($step_id);
        $step_child = $step->step_children->find($step_child_id);

        // GETパラメータの確認　編集者のidとstepのユーザーidの整合性
        if(Auth::id() != optional($step)->user_id || optional($step)->id != optional($step_child)->step_id){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }

        $step_child = $step->step_children->find($step_child_id);
        $step_child_clears = $step_child->step_child_clears;


        

        DB::transaction(function () use ($step_child, $step_child_clears) {
            foreach($step_child_clears as $step_child_clear) {
                $step_child_clear->delete();
            }        
            $step_child->delete();
        });


        
        return redirect('mystep/manage/'.$step->id, 301)->with('flash_message', '子STEPが削除されました');
            
    }
}
