<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class HomeController extends Controller
{
    //
    public function index() {
        $categories = Models\Category::all();
        $products = Models\Product::all();
        $isLogged = false;

        $data = [
            'categories' => $categories,
            'products' => $products,
            'isLogged' => $isLogged
        ];

        //return view('home', ['categories' => $categories, 'products' => $products, 'isLogged' => $isLogged]);
        return view('home.home', $data);
    }

    public function listing($categoryId, $search = null) {
        $category = Models\Category::find($categoryId);
        $categoryName = $category->category_name;
        $products = $category->products()->get();

        $data = [
            'category' => $categoryId,
            'category_name' => $categoryName,
            'products' => $products,
            'search' => $search
        ];

        return view('home.listing', $data);
    }

    public function details($category, $productId) {
        $product = Models\Product::find($productId);

        $data = [
            'category_name' => $category,
            'product' => $product
        ];
        return view('home.details', $data);
    }
}
