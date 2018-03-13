<?php

namespace App\Model\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillablle = ['ship_user_id','customer_id','Ship','Ship_Date','Active','Slug'];


    public function order_detail()
    {
    		return $this->hasMany('App\Model\Order\Order_Detail','order_id','id');
    }

    public function lang()
    {
    		return $this->belongsToMany('App\Model\Lang\Lang','order_detail','order_id','lang_id')->withPivot(['id','Name']);
    }
}

