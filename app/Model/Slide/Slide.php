<?php

namespace App\Model\Slide;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slide';
    protected $fillablle = ['image','Status'];


    public function slide_detail()
    {
    		return $this->hasMany('App\Model\Slide\Slide_Detail','slide_id','id');
    }

    public function lang()
    {
            return $this->belongsToMany('App\Model\Lang\Lang','slide_detail','slide_id','lang_id')->withPivot(['id','Title','Descriptions','url','css','Top','Bottom','Right','Left']);
    }
    
    
}

