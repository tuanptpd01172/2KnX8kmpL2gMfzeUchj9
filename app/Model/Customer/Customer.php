<?php

namespace App\Model\Customer;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillablle = ['Name','Birth','Address','Phone','Email','Job','Hobbies'];


    // public function post_detail()
    // {
    // 		return $this->hasMany('App\Model\Post\Post_Detail','post_id','id');
    // }
}

