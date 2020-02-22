<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_type_id');
            $table->string('name');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('voting_start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->string('theme')->nullable();
            $table->text('description')->nullable();
            $table->string('first_place_prize')->nullable();
            $table->string('second_place_prize')->nullable();
            $table->string('third_place_prize')->nullable();
            $table->string('runner_up_prize')->nullable();
            $table->string('runner_up_amount')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('event_type_id')->references('id')->on('event_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
