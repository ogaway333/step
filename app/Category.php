<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//カテゴリーモデル
class Category extends Model
{
    //timestamps利用しない
    public $timestamps = false;

    //hasMany設定
    public function steps()
    {
        return $this->hasMany('App\Step');
    }
}
