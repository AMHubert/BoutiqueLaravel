<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class HomeController extends Controller
{
    //
    public function index()
    {
        $categories = Models\Category::all();
        $products = Models\Product::all();
        $isLogged = false;

        $data = [
            'categories' => $categories,
            'products' => $products,
            'isLogged' => $isLogged
        ];

        //return view('home', ['categories' => $categories, 'products' => $products, 'isLogged' => $isLogged]);
        return view('home', $data);
    }

    public function listing($categoryId, $search = null)
    {

        //$products = Models\Product::all()->categories()->where('category_id', $categoryId)->get();
        $category = Models\Category::find($categoryId);
        $categoryName = $category->category_name;
        //$products = Models\Category::find($categoryId)->products()->get();
        $products = $category->products()->get();

        $data = [
            'category' => $categoryId,
            'category_name' => $categoryName,
            'products' => $products,
            'search' => $search
        ];

        return view('listing', $data);
    }

    public function details($category, $productId) {
        $product = Models\Product::find($productId)->categories()->where('category_name', $category);

        $data = [

            'product' => $product
        ];
        return view('details', $data);
    }
}
