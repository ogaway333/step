<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

//STEP一覧
Route::get('/step/list', 'Step\ListController@index')->name('step.list');

//STEP詳細
Route::get('/step/{step_id}', 'Step\DetailController@index')->name('step.detail');

//子STEP詳細
Route::get('/step/{step_id}/child/{step_child_id}', 'Step\DetailChildController@index')->name('step.detail_child');

//ユーザー情報
Route::get('/user/profile/{user_id}', 'User\ProfileController@index')->name('user.profile');

//home画面
Route::get('/', 'HomeController@index')->name('home');

Route::middleware('verified')->group(function() {
    //メール認証が完了した場合のみ、実行できるRoute

    //ユーザー情報編集画面
    Route::get('/user/edit', 'User\EditController@index')->name('user.edit');
    //ユーザー情報の更新
    Route::post('/user/edit', 'User\EditController@update')->name('user.edit');
    //パスワード変更画面
    Route::get('/user/password', 'User\PasswordController@index')->name('user.password');    
    //パスワード変更画面
    Route::post('/user/password/update', 'User\PasswordController@update')->name('user.password.update');

    //退会画面
    Route::get('/user/withdrawal', 'User\WithdrawalController@index')->name('user.withdrawal');
    //退会
    Route::post('/user/withdrawal', 'User\WithdrawalController@delete')->name('user.withdrawal');

    //STEP投稿画面
    Route::get('/mystep/register', 'Step\RegisterController@index')->name('mystep.register');
    //STEP投稿
    Route::post('/mystep/register', 'Step\RegisterController@register')->name('mystep.register');
    
    //STEP編集画面
    Route::get('/mystep/{step_id}/edit', 'Step\EditController@index')->name('mystep.edit');
    //STEP情報の更新
    Route::post('/mystep/{step_id}/edit', 'Step\EditController@update')->name('mystep.edit');
    //STEP情報の削除
    Route::post('/mystep/{step_id}/delete', 'Step\EditController@delete')->name('mystep.delete');
    
    //STEP管理画面
    Route::get('/mystep/manage/{step_id}', 'Step\ManageController@index')->name('mystep.manage');
    //STEP公開
    Route::post('/mystep/manage/{step_id}/show', 'Step\ManageController@show')->name('mystep.show');  

    //子STEP投稿画面
    Route::get('/mystep/{step_id}/child/register', 'StepChild\RegisterController@index')->name('mystep_child.register');
    //子STEP投稿
    Route::post('/mystep/{step_id}/child/register', 'StepChild\RegisterController@register')->name('mystep_child.register');

    //子STEP編集画面
    Route::get('/mystep/{step_id}/child/{step_child_id}/edit', 'StepChild\EditController@index')->name('mystep_child.edit');
    //子STEP更新
    Route::post('/mystep/{step_id}/child/{step_child_id}/edit', 'StepChild\EditController@update')->name('mystep_child.edit');
    //子STEP削除
    Route::post('/mystep/{step_id}/child/{step_child_id}/delete', 'StepChild\EditController@delete')->name('mystep_child.delete');


    //STEP開始
    Route::post('/step/{step_id}', 'Step\DetailController@start')->name('step.start');

    //STEPのチャレンジを削除
    Route::post('/step/{step_id}/delete', 'Step\DetailController@delete')->name('step.give_up');

    //子STEPクリア
    Route::post('/step/{step_id}/child/{step_child_id}', 'Step\DetailChildController@clear')->name('step.clear');

    //子STEPクリアを削除
    Route::post('/step/{step_id}/child/{step_child_id}/delete', 'Step\DetailChildController@delete')->name('step.cancel');
});
