<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbEventotbTipoTrabalho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbEventotbTipoTrabalho', function (Blueprint $table) {
            $table->integer('id_evento')->unsigned();
            $table->integer('id_tipoTrabalho')->unsigned();
            $table->primary(array('id_evento','id_tipoTrabalho'));
            $table->foreign('id_evento')->references('id')->on('tbEvento')->onUpdated('cascade');
            $table->foreign('id_tipoTrabalho')->references('id')->on('tbTipoTrabalho')->onUpdated('cascade');
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
