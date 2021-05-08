<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//stepのタグ名をnullでもOKにする変更
class ChangeTagNameNotNullToNullOnStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('steps', function (Blueprint $table) {
            $table->string('tag_name1')->nullable()->change();
            $table->string('tag_name2')->nullable()->change();
            $table->string('tag_name3')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('steps', function (Blueprint $table) {
            $table->string('tag_name1')->nullable(false)->change();
            $table->string('tag_name2')->nullable(false)->change();
            $table->string('tag_name3')->nullable(false)->change();
        });
    }
}
