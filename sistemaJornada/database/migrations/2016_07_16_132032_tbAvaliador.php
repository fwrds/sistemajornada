<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbAvaliador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

    Schema::create('tbAvaliador', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->integer('id_areaConhecimento')->unsigned();
            $table->foreign('id')->references('id')->on('tbParticipante')->onUpdated('cascade')->onDelete('cascade');
            $table->foreign('id_areaConhecimento')->references('id')->on('tbAreaConhecimento')->onUpdated('cascade');
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
