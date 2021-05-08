<?php

use Illuminate\Database\Seeder;

class StepChildrenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\StepChild::class, 400)->create();
    }
}
