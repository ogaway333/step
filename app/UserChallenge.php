<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserChallenge extends Model
{
    use SoftDeletes;

    protected $fillable = [

    ];

    //belongsTo設定
    public function user()
    {
        return $this->belongsTo('App\User', 'challenger_id');
    }

    public function step()
    {
        return $this->belongsTo('App\Step', 'step_id');
    }

    //hasMany設定
    public function step_child_clears()
    {
        return $this->hasMany('App\StepChildClear', 'challenge_id', 'id');
    }
}
