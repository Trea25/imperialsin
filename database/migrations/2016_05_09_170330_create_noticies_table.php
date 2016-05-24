<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ntitol');
            $table->string('ndesc');
            $table->boolean('nactiu');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('carrer_id')->unsigned();
            $table->foreign('carrer_id')->references('id')->on('carrers');
            $table->integer('descripcio')->unsigned()->nullable();
            $table->foreign('descripcio')->references('id')->on('descripcions');
            $table->integer('foto_id')->unsigned()->nullable();
            $table->foreign('foto_id')->references('id')->on('fotos');
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
        Schema::drop('noticies');
    }
}
