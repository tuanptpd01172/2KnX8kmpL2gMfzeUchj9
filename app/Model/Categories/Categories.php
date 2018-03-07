<?php

namespace App\Model\Categories;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillablle = ['Image','Slug','Status'];


    public function categories_detail()
    {
    		return $this->hasMany('App\Model\Categories\Categories_Detail','categories_id','id');
    }
    public function lang()
    {
    		return $this->belongsToMany('App\Model\Lang\Lang','categories_detail','categories_id','lang_id')->withPivot(['id','Name']);
    }
}

