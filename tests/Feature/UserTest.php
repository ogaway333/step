<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions; 
use Illuminate\Foundation\Testing\WithoutMiddleware;

//テスト実行例
//vendor/bin/phpunit tests/Feature/UserTest.php
//ユーザ関連のテスト
class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    //user登録画面のテスト
    public function testGetTest()
    {
        $response = $this->get('/register');
        
        $response->assertStatus(200);
    
    }


    //user登録(成功)のテスト（名前が30文字以内）
    public function testPostName_ok()
    {
        $this->withoutMiddleware();
        $response = $this->post('/register' ,[
        'name' => 'ぁあぃいぅうぇえぉおかがきぎくぐけげこごさざしじすずせぜそぞ',
        'email' => 'test555@gmail.com',
        'password' => '12345678',
        'password_confirmation' => '12345678',
        ]);
        $response->assertRedirect('/home');  
    }

    //user登録(失敗)のテスト（名前が31文字以上）
    public function testPostName_over()
    {
        $this->withoutMiddleware();
        $response = $this->post('/register' ,[
        'name' => 'ぁあぃいぅうぇえぉおかがきぎくぐけげこごさざしじすずせぜそぞぞああああああ',
        'email' => 'test555@gmail.com',
        'password' => '12345678',
        'password_confirmation' => '12345678',
        ]);
        $response->assertRedirect('/');
    }

    //user登録(失敗)のテスト（名前が空）
    public function testPostName_null()
    {
        $this->withoutMiddleware();
        $response = $this->post('/register' ,[
        'name' => '',
        'email' => 'test555@gmail.com',
        'password' => '12345678',
        'password_confirmation' => '12345678',
        ]);
        $response->assertRedirect('/');
    }

}
