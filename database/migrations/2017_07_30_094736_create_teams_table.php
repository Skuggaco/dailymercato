<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameTeam');
            $table->string('nameLongTeam');
            $table->string('slugTeam');
            $table->string('imgTeam');
            $table->integer('league_id')->unsigned();
            $table->timestamps();

            $table->foreign('league_id')
                  ->references('id')
                  ->on('leagues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
