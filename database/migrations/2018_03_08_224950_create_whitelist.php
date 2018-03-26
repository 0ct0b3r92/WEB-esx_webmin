<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhitelist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whitelist', function (Blueprint $table) {

            $table->increments('id');
            $table->string('user_id');
            $table->string('admin_id')->nullable();
            $table->boolean('status')->default(0);
            $table->string('rpname');
            $table->string('sexe');
            $table->string('town');
            $table->date('birthday');
            $table->string('experiance');
            $table->longText('history');
            $table->string('invited_by')->nullable();
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
        Schema::dropIfExists('whitelist');
    }
}
