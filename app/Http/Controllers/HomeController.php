<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Product;
use App\Models;

class HomeController extends Controller
{
    //
    public function index() {
        $categories = Models\Category::all();
        //$products = Models\Product::all();
        $isLogged = false;

        $productsCat = Product::getHighlight();

        $data = [
            'categories' => $categories,
            'productsCat' => $productsCat,
            'isLogged' => $isLogged
        ];

        //return view('home', ['categories' => $categories, 'products' => $products, 'isLogged' => $isLogged]);
        return view('home.home', $data);
    }

    public function listing($categoryName, $search = null) {
        //$category = Models\Category::find($categoryId);
        $category = Models\Category::all()->where('category_name', $categoryName)->first(); //Get category by name
        $categoryName = $category->category_name;
        $products = $category->products()->get();

        $data = [
            'category_name' => $categoryName,
            'products' => $products,
            'search' => $search
        ];

        return view('home.listing', $data);
    }

    public function details($categoryName, $productId) {
        $product = Models\Product::find($productId);

        $data = [
            'category_name' => $categoryName,
            'product' => $product
        ];
        return view('home.details', $data);
    }
}
