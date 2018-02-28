<?php

namespace App\Model\Lang;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    protected $table = 'lang';
    protected $fillablle = ['Image','Locale','Name'];


    // public function post_detail()
    // {
    // 		return $this->hasMany('App\Model\Post\Post_Detail','post_id','id');
    // }
}

