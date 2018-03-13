<?php

namespace App\Model\Slide;

use Illuminate\Database\Eloquent\Model;

class Slide_Detail extends Model
{
    protected $table = 'slide_detail';
    protected $fillablle = ['slide_id','lang_id','Title','Descriptions','url','css','Top','Bottom','Right','Left'];


    public function slide()
    {
    		return $this->belongsTo('App\Model\Slide\Slide','slide_id','id');
    }
}

