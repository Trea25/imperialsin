<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('etitol');
            $table->dateTime('edata_inici');
            $table->dateTime('edata_final');
            $table->boolean('eactiu');
            $table->integer('tipus_id')->unsigned();
            $table->foreign('tipus_id')->references('id')->on('tipus_events');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('carrer_id')->unsigned();
            $table->foreign('carrer_id')->references('id')->on('carrers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
