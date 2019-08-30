<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'productcategory', 'product_id', 'category_id');
    }
}
