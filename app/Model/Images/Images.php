<?php

namespace App\Model\Images;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'image';
    protected $fillablle = ['post_id','url'];


    public function post()
    {
    		return $this->belongsTo('App\Model\Post\Post','post_id','id');
    }
   
}

