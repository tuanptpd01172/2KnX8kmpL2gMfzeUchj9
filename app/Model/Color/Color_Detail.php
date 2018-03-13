<?php

namespace App\Model\Color;

use Illuminate\Database\Eloquent\Model;

class Color_Detail extends Model
{
    protected $table = 'color_detail';
    protected $fillablle = ['color_id','lang_id','Name'];


    public function color()
    {
    		return $this->belongsTo('App\Model\Color\Color','color_id','id');
    }
}

