<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbAreaConhecimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbAreaConhecimento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->integer('id_grandeAreaConhecimento')->unsigned()->nullable();
            $table->foreign('id_grandeAreaConhecimento')->references('id')->on('tbGrandeAreaConhecimento')->onUpdated('cascade');
            $table->timestamps();
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
