<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namePlayer');
            $table->string('surNamePlayer');
            $table->dateTime('birthdayPlayer');
            $table->dateTime('contractPlayer');
            $table->string('twitterPlayer')->nullable();
            $table->string('instagramPlayer')->nullable();
            $table->string('snapchatPlayer')->nullable();
            $table->float('salaryPlayer')->unsigned()->nullable();
            $table->float('valuePlayer');
            $table->float('valueVotePlayer');
            $table->integer('numberVotePlayer');
            $table->string('slugPlayer');

            $table->integer('country_id')->unsigned();
            $table->integer('position_id')->unsigned();

            $table->timestamps();

            $table->foreign('country_id')
                  ->references('id')
                  ->on('countries');

            $table->foreign('position_id')
                ->references('id')
                ->on('positions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
