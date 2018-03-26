<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('type_id');
            $table->string('title');
            $table->longText('content');
            $table->timestamps();
        });

        Schema::create('report_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('name');
            $table->integer('label');
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
        Schema::dropIfExists('report');
        Schema::dropIfExists('report_types');
    }
}
