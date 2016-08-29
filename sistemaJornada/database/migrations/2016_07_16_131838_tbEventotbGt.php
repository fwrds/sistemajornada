<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbEventotbGt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbEventotbGt', function (Blueprint $table) {
            $table->integer('id_evento')->unsigned();
            $table->integer('id_gt')->unsigned()->nullable();
            $table->primary(array('id_evento','id_gt'));
            $table->foreign('id_evento')->references('id')->on('tbEvento')->onUpdated('cascade');
            $table->foreign('id_gt')->references('id')->on('tbGt')->onUpdated('cascade');
            $table->boolean('disponivel')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
