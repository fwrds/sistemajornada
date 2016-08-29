<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Participante;
use App\TipoTrabalho;
use App\Resumo;

class Trabalho extends Model
{
	protected $table='tbTrabalho';
	protected $fillable=[
	'id','titulo',];


	public function participante(){
			return $this->belongsTo(Participante::class)
		}
	public function tipoTrabalho(){
			return $this->belongsTo(TipoTrabalho::class)
		}
	public function resumos(){
			return $this->hasMany(Resumo::class)
		}
    //
}
