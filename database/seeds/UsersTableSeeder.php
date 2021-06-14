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
            'email' => '1020test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('k9TUinAs'), // k9TUinAsでログインできる
            'remember_token' => str_random(10),
        ]);

        // モデルファクトリーで定義したテストユーザーを9作成
        factory(App\User::class, 9)->create();
    }
}
