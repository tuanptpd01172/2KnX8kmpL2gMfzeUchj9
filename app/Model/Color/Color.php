<?php

namespace App\Model\Color;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    protected $fillablle = ['Code'];


    public function color_detail()
    {
    		return $this->hasMany('App\Model\Color\Color_Detail','color_id','id');
    }

    public function lang()
    {
    		return $this->belongsToMany('App\Model\Lang\Lang','color_detail','color_id','lang_id')->withPivot(['id','Name']);
    }
}

