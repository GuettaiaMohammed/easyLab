<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{

	use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function equipe(){
    	return $this->belongsTo('App\Equipe');
    }

    public function categorie(){
    	return $this->belongsTo('App\Categorie');
    }
}