<?php

namespace App\Model\Post;

use Illuminate\Database\Eloquent\Model;

class Post_Detail extends Model
{
    protected $table = 'post_detail';
    protected $fillablle = ['post_id','lang_id','Title','Descriptions','Price','Price_Sale'];


    public function post()
    {
    		return $this->belongsTo('App\Model\Post\Post','post_id','id');
    }
}

