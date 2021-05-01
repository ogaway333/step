<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
php artisan make:model User
php artisan make:controller HelloController
php artisan make:controller Example/ExampleController
php artisan make:migration create_users_table
php artisan migrate
php artisan migrate:rollback
*/

//ステップモデル
class Step extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'category_id',
        'clear_time',
        'tag_name1',
        'tag_name2',
        'tag_name3',
        'content',
        'challenger_count'
    ];

    //belongsTo設定
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    //hasMany設定
    public function step_children()
    {
        return $this->hasMany('App\StepChild');
    }

    public function user_challenges()
    {
        return $this->hasMany('App\UserChallenge');
    }
}
