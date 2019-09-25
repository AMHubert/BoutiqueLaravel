<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Models\ProductOrder', 'id', 'order_id');
    }
}
