<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'productcategory', 'category_id', 'product_id');
    }
}
