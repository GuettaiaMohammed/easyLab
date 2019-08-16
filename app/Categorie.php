<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function materiels(){
    	return $this->hasMany('App\Materiel');
    }
}
