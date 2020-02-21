<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger( 'team_id' );
            $table->unsignedBigInteger( 'event_id' );
            $table->string( 'name' )->nullable();
            $table->string( 'url' )->nullable();
            $table->string( 'source' )->nullable();
            $table->text( 'description' )->nullable();
            $table->timestamps();

            $table->foreign( 'team_id' )->references( 'id' )->on( 'teams' );
            $table->foreign( 'event_id' )->references( 'id' )->on( 'events' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
