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
    public function slide()
    {
            return $this->belongsToMany('App\Model\Slide\Slide','slide_detail','lang_id','slide_id');
    }
    public function category()
    {
            return $this->belongsToMany('App\Model\Categories\Categories','categories_detail','lang_id','categories_id');
    }
    public function post()
    {
    		return $this->belongsToMany('App\Model\Post\Post','post_detail','lang_id','post_id')->withPivot(['id','Title','Descriptions','Price','Price_Sale','Short_Descriptions']);
    }
}

