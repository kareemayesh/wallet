<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->integer('senderid')->unsigned()->index();
            $table->integer('reciverid')->unsigned()->index();
            $table->string('recivername');
            $table->string('sendername');
            $table->integer('wid')->unsigned()->index();

            $table->timestamps();
            $table->foreign('reciverid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('senderid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('wid')->references('id')->on('wallets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('request');
    }
}
