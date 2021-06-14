<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//子stepのテーブルの作成
class CreateStepChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('clear_time');
            $table->text('content');
            $table->unsignedBigInteger('step_id');
            $table->foreign('step_id')->references('id')->on('steps');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step_children');
    }
}
