<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Participante;
use App\AreaConhecimento;
use App\Avaliacao;
class Autor extends Model
{
	protected $table='tbAvaliador';
    protected $fillable ['id',];
    public function participante()
		{
			return $this->belongsTo(Participante::class,'id');	
		}
	 public function areaConhecimento()
		{
			return $this->belongsTo(AreaConhecimento::class);	
		}
	public function avaliacoes()
		{
			return $this->hasMany(Avaliacao::class);	
		}
}
