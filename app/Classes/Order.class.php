<?php

namespace App\Classes;

use DB;
use Illuminate\Database\Schema\Builder;

class Order
{

    static function getAllUserOrder($userId){
        $orders = [];/*DB::table('productcategory')
                    ->join('categories', 'productcategory.category_id', '=', 'categories.category_id')
                    ->join('products', 'productcategory.product_id', '=', 'products.product_id')
                    ->select('categories.*', 'products.*');*/

        return $orders;
    }
}
