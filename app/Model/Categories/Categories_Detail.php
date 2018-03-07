<?php

namespace App\Model\Categories;

use Illuminate\Database\Eloquent\Model;

class Categories_Detail extends Model
{
    protected $table = 'categories_detail';
    protected $fillablle = ['categories_id','lang_id','Name'];


    public function categories()
    {
    		return $this->belongsTo('App\Model\Categories\Categories','categories_id','id');
    }
}

