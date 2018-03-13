<?php

namespace App\Model\Comment;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillablle = ['post_id','Content','comment_id'];


    // public function post_detail()
    // {
    // 		return $this->hasMany('App\Model\Post\Post_Detail','post_id','id');
    // }
}

