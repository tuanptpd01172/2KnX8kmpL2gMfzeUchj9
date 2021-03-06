<?php

namespace App\Model\Categories;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillablle = ['Image','Slug','Status','parent_id'];


    public function categories_detail()
    {
    		return $this->hasMany('App\Model\Categories\Categories_Detail','categories_id','id');
    }
    public function lang()
    {
            return $this->belongsToMany('App\Model\Lang\Lang','categories_detail','categories_id','lang_id')->withPivot(['id','Name','Descriptions']);
    }
    public function post()
    {
    		return $this->hasMany('App\Model\Post\Post','categories_id','id');
    }
}

