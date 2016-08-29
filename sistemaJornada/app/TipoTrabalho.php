<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Trabalho;
use App\CriterioAvaliacao;


class TipoTrabalho extends Model
{
	protected $table='tbTipoTrabalho';
	protected $fillable = [
	'id','descricao',];

	public function trabalhos(){
			return $this->hasMany(Trabalho::class)
    	}
	public function criteriosAvaliacao(){
			return $this->hasMany(CriterioAvaliacao::class)
    	}
 	 public function eventos(){
        return $this->belongsToMany(Evento::class,'tbEventotbTipoTrabalho','id_tipoTrabalho','id_evento');
    }
}
