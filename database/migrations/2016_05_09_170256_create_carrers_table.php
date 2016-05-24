<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnom');
            $table->string('cdescripcio');
            $table->integer('cany_inici')->nullable();
            $table->string('cfacebook')->nullable();
            $table->string('ctwitter')->nullable();
            $table->string('cinstagram')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('carrers');
    }
}
