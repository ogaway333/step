<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StepChild extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
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