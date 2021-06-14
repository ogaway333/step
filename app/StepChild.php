<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//子ステップモデル
class StepChild extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'clear_time',
        'content'
    ];
    //belongsTo設定
    public function step()
    {
        return $this->belongsTo('App\Step', 'step_id');
    }

    //hasMany設定
    public function step_child_clears()
    {
        return $this->hasMany('App\StepChildClear');
    }

}
