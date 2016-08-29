<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Trabalho;

class Resumo extends Model
{
	protected $table='tbResumo';
   protected $fillable = [
   'id','texto','palavras_chave','revisao_avaliador','suatus'];


   public function trabalho(){

   		return $this->belongsTo(Trabalho::class)
   }
}
