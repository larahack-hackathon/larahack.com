<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entry_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vote_category_id');
            $table->timestamps();

            $table->foreign('entry_id')->references('id')->on('entries');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vote_category_id')->references('id')->on('vote_categories');

            $table->unique(['entry_id', 'user_id', 'vote_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
