<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_quests', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('user_id')->unsigned();
	    $table->integer('quest_id')->unsigned();
	    $table->boolean('status');
	    $table->timestamp('time_start');
	    $table->timestamp('time_end');
	    $table->foreign('user_id')->references('id')->on('users');
	    $table->foreign('quest_id')->references('id')->on('quests');
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
        Schema::dropIfExists('users_quests');
    }
}
