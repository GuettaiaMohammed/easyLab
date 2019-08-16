<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Partenaire extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

     public function projets()
    {
        return $this->belongsToMany('App\Projet');
    }
    
       public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
  
}
