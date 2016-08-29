<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbParticipanteTbEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbParticipanteTbEvento', function (Blueprint $table) {
            $table->integer('id_evento')->unsigned();
            $table->integer('id_participante')->unsigned();
            $table->primary(array('id_evento','id_participante'));
            $table->foreign('id_evento')->references('id')->on('tbEvento')->onUpdated('cascade');
            $table->foreign('id_participante')->references('id')->on('tbParticipante')->onUpdated('cascade');
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
