<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\TipoTrabalho;
use App\Avaliacao;
class CriterioAvaliacao extends Model
{
	protected $table='tbCriterioAvaliacao';
  protected $fillable['id','nome','descricao','peso',];

  public function tipoTrabalho(){
  	return $this->belongsTo(TipoTrabalho::class);
  }
  public function avaliacoes(){
        return $this->belongsToMany(Avaliacao::class,'tbAvtbcriterioAv','id_criterioAvaliacao','id_avaliacao');
    }
}
