<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use\Illuminate\Database\Eloquent\Relations\BelongsTo;
use\Illuminate\Database\Eloquent\Relations\BelongsTo;
use\Illuminate\Database\Eloquent\Relations\HasMany;
use App\Avaliador;
use App\Trabalho;
use App\CriterioAvaliacao;

class Avaliacao extends Model
{
	protected $table = 'tbAvaliacao';
	protected $fillable ['id','nota',];
	public function avaliador()
		{
			return $this->belongsTo(Avaliador::class,'id');	
		}
	public function trabalho()
		{
			return $this->belongsTo(Trabalho::class,'id');	
		}
	 public function criteriosAvaliacao(){
        return $this->belongsToMany(CriterioAvaliacao::class,'tbAvtbcriterioAv','id_avaliacao','id_criterioAvaliacao');
    }
		
    //
}
