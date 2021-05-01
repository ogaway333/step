<?php

namespace App\Http\Controllers\Step;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Step;
use App\Category;
use Auth;

class ListController extends Controller
{
    public function index(Request $request) {
        $order = $request->order;
        $categories = Category::all();
        $category_id = $request->category_id;
        $q = $request->q;

        $query = Step::query();

        $query->where('show_flg', true);

        if(!empty($category_id)) {
            $query->whereIn('category_id', $category_id);
        }


        if(!empty($q)) {
            $query->where('title', 'like', '%'.$q.'%')
            ->orWhere('tag_name1', 'like', '%'.$q.'%')
            ->orWhere('tag_name2', 'like', '%'.$q.'%')
            ->orWhere('tag_name3', 'like', '%'.$q.'%');
        }

        switch ($order) {
            case ($order === 'new'):
                $query->orderBy('id', 'desc');
                break;
            case ($order === 'challenge_num'):
                $query->orderBy('challenger_count', 'desc');
                break;
            case ($order === 'old'):
                $query->orderBy('id', 'asc');
                break;
            default:
                $query->orderBy('id', 'desc');
                break;
        }
        $result_count = $query->count();
        $query->with('category'); 
        $steps = $query->paginate(5);

        return view('step.list', compact('steps', 'categories', 'order', 'category_id', 'q', 'result_count')); 
    }
}
