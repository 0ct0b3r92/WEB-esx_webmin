<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('users_id');
            $table->integer('categories_id')->default('1');
            $table->longText('content');
            $table->string('images');
            $table->timestamps();
        });


        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('category')->insert(['id' => '1', 'name' => 'Non Classée']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
        Schema::dropIfExists('category');
    }
}
