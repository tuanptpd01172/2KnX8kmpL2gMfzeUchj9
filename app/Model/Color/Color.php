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
}

