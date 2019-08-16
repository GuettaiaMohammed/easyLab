<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ContactProjet extends Model
{
   protected $table = "contact_projet";
   use SoftDeletes;

    protected $dates = ['deleted_at'];
     protected $fillable = ['projet_id'];
}
