<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
	Schema::create('quests', function (Blueprint $table) {
	    $table->increments('id');
	    $table->string('title');
	    $table->string('short_description');
	    $table->text('description');
	    $table->string('photo')->nullable();
	    $table->integer('execution_time');
	    $table->integer('author_id')->unsigned();
	    $table->integer('rating')->default(0);
	    $table->integer('points')->default(10);
	    $table->boolean('published')->default(false);
	    $table->integer('moderated')->default(0);
	    $table->text('moderation_info')->nullable();
	    $table->foreign('author_id')->references('id')->on('users');
	    $table->timestamps();
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
	Schema::dropIfExists('quests');
    }

}
