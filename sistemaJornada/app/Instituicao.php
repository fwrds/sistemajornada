<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Particippante;

class Instituicao extends Model
{
	protected $table='tbInstituicao';
	 protected $fillable = [
        'id','nome', 
    ];

    public function eventos(){
    	return $this->hasMany(Particippante::class);
    }
    //
}
