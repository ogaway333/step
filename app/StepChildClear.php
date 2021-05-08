<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//子ステップクリアモデル
class StepChildClear extends Model
{
    use SoftDeletes;
    protected $fillable = [

    ];
    //belongsTo設定
    public function users_challenge()
    {
        return $this->belongsTo('App\UserChallenge', 'challenge_id');
    }

    public function step_child()
    {
        return $this->belongsTo('App\StepChild', 'step_child_id');
    }
}
