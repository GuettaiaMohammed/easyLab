<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ContactArticle extends Model
{
    	use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "article_contact";
}
