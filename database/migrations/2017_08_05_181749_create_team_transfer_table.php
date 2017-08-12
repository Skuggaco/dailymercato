<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_transfer', function (Blueprint $table) {
            $table->integer('transfer_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->boolean('left')->default(1);
            $table->primary(['transfer_id', 'team_id']);

            $table->foreign('transfer_id')
                  ->references('id')
                  ->on('transfers');
            $table->foreign('team_id')
                  ->references('id')
                  ->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_transfer');
    }
}
