<?php

namespace App\Classes;

use App\Models;
use DB;
use Illuminate\Database\Schema\Builder;

class Product {
    public $_id;
    public $_name;
    public $_img;
    public $_category;
    public $_price;

    public function __construct($id, $name, $img, $category, $price) {
        $this->_id = $id;
        $this->_name = $name;
        $this->_img = $img;
        $this->_category = $category;
        $this->_price = $price;
    }

    static function getHighlight(){

        $productsCategories = DB::table('productcategory')
                                ->join('categories', 'productcategory.category_id', '=', 'categories.category_id')
                                ->join('products', 'productcategory.product_id', '=', 'products.product_id')
                                ->select('categories.*', 'products.*')
                                ->inRandomOrder()
                                ->limit(3)->get();

        return $productsCategories;
    }

    static function getSearchProduct($search){
        $product = DB::table('productcategory')
                    ->join('categories', 'productcategory.category_id', '=', 'categories.category_id')
                    ->join('products', 'productcategory.product_id', '=', 'products.product_id')
                    ->select('products.*', 'categories.*')
                    ->where('products.product_name', 'like',  '%'.$search.'%')
                    ->get();

        return $product;
    }
}
