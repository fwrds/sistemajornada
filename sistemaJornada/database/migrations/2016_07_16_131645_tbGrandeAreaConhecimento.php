<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbGrandeAreaConhecimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('tbGrandeAreaConhecimento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
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
