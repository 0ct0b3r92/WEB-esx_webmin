<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugTracker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bug_tracker', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id');
            $table->integer('type_id')->default(0);
            $table->integer('status')->default(0);
            $table->string('title');
            $table->longText('content');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('bug_type')->onDelete('cascade');
            $table->timestamps();

        });

        Schema::create('bug_type', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('type');

        });

        Schema::create('bug_comment', function(Blueprint $table){
            $table->increments('id');
            $table->integer('tracker_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('vote')->index();
            $table->foreign('tracker_id')->references('id')->on('bug_tracker')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bug_tracker');
        Schema::dropIfExists('bug_type');
        Schema::dropIfExists('bug_comment');
    }
}
