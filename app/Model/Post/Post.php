<?php

namespace App\Model\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillablle = ['categories_id','user_id','Status','Slug','Avatar','Kind','View'];


    public function post_detail()
    {
    		return $this->hasMany('App\Model\Post\Post_Detail','post_id','id');
    }
}

