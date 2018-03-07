<?php

namespace App\Model\Post;

use Illuminate\Database\Eloquent\Model;

class Post_Detail extends Model
{
    protected $table = 'post_detail';
    protected $fillablle = ['post_id','lang_id','Title','Descriptions','Price'];


    // public function post_detail()
    // {
    // 		return $this->hasMany('App\Model\QuanLy\HocSinh\HocSinh','hocsinh_id','id');
    // }
}

