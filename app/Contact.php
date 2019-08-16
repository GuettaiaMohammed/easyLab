<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contact extends Model
{
	use SoftDeletes;
    protected $dates = ['deleted_at'];
       public function partenaire()
    {
        return $this->belongsTo('App\Partenaire');
    }

      public function projets()
    {
        return $this->belongsToMany('App\Projet');
    }

       public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

       public function users()
    {
        return $this->belongsToMany('App\User');
    }


       public function these()
    {
        return $this->hasOne('App\These');
    }
}
