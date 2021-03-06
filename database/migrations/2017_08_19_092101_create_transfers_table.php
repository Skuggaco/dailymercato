<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id')->unsigned();
            $table->integer('session_id')->unsigned()->nullable();
            $table->integer('yesTransfer')->default(0);
            $table->integer('noTransfer')->default(0);
            $table->boolean('offTransfer')->default(0);
            $table->float('amountTransfer')->nullable();
            $table->string('linkTransfer')->nullable();
            $table->boolean('activeTransfer')->default(1);
            $table->timestamps();

            $table->foreign('player_id')
                ->references('id')
                ->on('players');

            $table->foreign('session_id')
                ->references('id')
                ->on('sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
}
