<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\AreaConhecimento;

class GrandeAreaConhecimento extends Model
{
	protected $table='tbGrandeAreaConhecimento';
   protected $fillable['id','descricao',];

   public function areasConhecimento(){
   			return $this->hasMany(AreaConhecimento::class)
   		}
}
