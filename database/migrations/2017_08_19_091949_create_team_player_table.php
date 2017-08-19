<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_player', function (Blueprint $table) {
            $table->integer('team_id')->unsigned();
            $table->integer('player_id')->unsigned();
            $table->boolean('activity');

            $table->primary(['team_id', 'player_id']);

            $table->foreign('team_id')
                ->references('id')
                ->on('teams');

            $table->foreign('player_id')
                ->references('id')
                ->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_player');
    }
}
