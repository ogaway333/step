<?php

use Illuminate\Database\Seeder;
/*
php artisan make:factory UserFactory --model=User ファクトリーの作成
php artisan make:seeder UsersTableSeeder シーダークラスの定義
composer dump-autoload Composerのオートローダを再生成
php artisan db:seed 全てのシーダー実行
php artisan db:seed --class=UsersTableSeeder 特定のシーダーの実行
php artisan migrate:fresh --seed テーブルをすべてドロップし、マイグレーションを再実行
*/
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(StepsTableSeeder::class);
        $this->call(StepChildrenTableSeeder::class);
    }
}
