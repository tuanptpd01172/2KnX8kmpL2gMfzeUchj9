<?php

namespace App\Model\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillablle = ['categories_id','user_id','Status','Slug','Avatar','Kind','View','color_id'];


    public function post_detail()
    {
    		return $this->hasMany('App\Model\Post\Post_Detail','post_id','id');
    }
    public function color()
    {
    		return $this->belongsTo('App\Model\Color\Color','color_id','id');
    }
    public function categories()
    {
            return $this->belongsTo('App\Model\Categories\Categories','categories_id','id');
    }
    public function lang()
    {
            return $this->belongsToMany('App\Model\Lang\Lang','post_detail','post_id','lang_id')->withPivot(['id','Title','Descriptions','Price','Price_Sale','Short_Descriptions']);
    }
    public function image()
    {
    		return $this->hasMany('App\Model\Images\Images','post_id','id');
    }
    
}

