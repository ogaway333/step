<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
            'name' => '英語',
        ]);

        App\Category::create([
            'name' => 'プログラミング',
        ]);

        App\Category::create([
            'name' => 'ビジネス',
        ]);

        App\Category::create([
            'name' => 'ライティング',
        ]);

        App\Category::create([
            'name' => '日常',
        ]);
        
        App\Category::create([
            'name' => 'デザイン',
        ]);
        App\Category::create([
            'name' => 'その他',
        ]);
        



    }
}
