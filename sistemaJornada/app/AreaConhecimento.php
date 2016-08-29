<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Avaliador;
use App\GrandeAreaConhecimento;

class AreaConhecimento extends Model
{
	protected $table='tbAreaConhecimento';
    protected $fillable['id','descricao',];

    public function grandeAreaConhecimento(){
    	return $this->belongsTo(GrandeAreaConhecimento::class,'id')
    }
    public function avaliadores(){
    	return $this->hasMany(Avaliador::class,'id')
    }
}
