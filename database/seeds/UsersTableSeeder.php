<?php

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 開発用ユーザーを定義
        App\User::create([
            'name' => 'step',
            'profile' => 'よろしくお願いします。',
            'email' => 'step@info.com',
            'email_verified_at' => now(),
            'password' => Hash::make('my_secure_password'), // my_secure_passwordでログインできる
            'remember_token' => str_random(10),
        ]);

        // モデルファクトリーで定義したテストユーザーを9作成
        factory(App\User::class, 9)->create();
    }
}
