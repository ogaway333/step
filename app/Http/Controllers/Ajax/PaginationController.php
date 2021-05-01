<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Step;

class PaginationController extends Controller
{
    public function index() {
        $query = Step::query();
        $query->where('show_flg', true);
        $query->with('category');
        

        return $query->paginate(5); 
    }
}
