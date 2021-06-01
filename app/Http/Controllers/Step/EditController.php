<?php

namespace App\Http\Controllers\Step;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Step;
use Auth;


//step編集画面の制御
class EditController extends Controller
{
    //step編集画面の表示
    public function index($id) {
        $step = Step::find($id);
        // GETパラメータの確認
        // 数字ではない、または編集者のidとstepのユーザーidが一致しなかった場合のリダイレクト処理
        if(!ctype_digit($id) || Auth::id() != optional($step)->user_id){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }
        // categoryテーブルのすべてのデータを取得し、$categoryに代入
        $categories = Category::all();
        return view('mystep.edit', compact('categories', 'step'));
    }

    //stepの更新
    public function update($id, Request $request) {
        $step = Step::find($id);
        // GETパラメータの確認
        // 数字ではない、または編集者のidとstepのユーザーidが一致しなかった場合のリダイレクト処理
        if(!ctype_digit($id) || Auth::id() != optional($step)->user_id){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }
        $request->validate([
            'title'=>['required','string','max:100'],
            'category_id' =>['required','integer','exists:categories,id'],
            'clear_time'=>['required','string','max:10'],
            'tag_name1'=>['nullable','string','max:10'],
            'tag_name2'=>['nullable','string','max:10'],
            'tag_name3'=>['nullable','string','max:10'],
            'content'=>['required','string','max:5000'],
        ]);
        
        $step->fill($request->all())->save();
        return redirect('mystep/manage/'.$step->id, 301)->with('flash_message', 'STEPが投稿されました');
            
    }

    //stepの削除
    public function delete($id) {
        $step = Step::find($id);
        // GETパラメータの確認
        // 数字ではない、または編集者のidとstepのユーザーidが一致しなかった場合のリダイレクト処理
        if(!ctype_digit($id) || Auth::id() != optional($step)->user_id){
            return back()->withInput()->with('flash_message_err', 'パラメータが不正です');
        }

        $step_children = $step->step_children;

        DB::transaction(function () use ($step, $step_children) {
            foreach($step_children as $step_child) {
                $step_child->delete();
            }        
            $step->delete();
        });


        
        return redirect('/home', 301)->with('flash_message', 'STEPが削除されました');
            
    }
}
