<?php

namespace App\Classes;

use App\Models;

class Category
{
    public static function getCategoryId($categoryName){
        $category = Models\Category::all()->where('category_name', $categoryName)->first();
        $categoryId = $category->category_id;
        return $categoryId;
    }
}
