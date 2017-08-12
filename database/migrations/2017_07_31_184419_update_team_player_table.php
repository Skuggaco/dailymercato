<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTeamPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_player', function (Blueprint $table) {
            $table->integer('player_id')->unsigned();

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
        Schema::table('team_player', function (Blueprint $table) {
            $table->dropForeign('team_player_player_id_foreign');
            $table->dropColumn('player_id');
        });
    }
}
