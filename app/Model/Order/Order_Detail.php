<?php

namespace App\Model\Order;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table = 'order_detail';
    protected $fillablle = ['categories_id','lang_id','Name'];


    public function order()
    {
    		return $this->belongsTo('App\Model\Order\Order','order_id','id');
    }
}

