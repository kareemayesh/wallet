<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wid')->unsigned()->index();
            $table->integer('userid')->unsigned()->index();

            $table->timestamps();
            $table->foreign('wid')->references('id')->on('wallets')->onDelete('cascade');
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pivot');
    }
}
