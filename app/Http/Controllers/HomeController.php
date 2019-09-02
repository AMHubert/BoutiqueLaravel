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

    public function listing($categoryId)
    {

        //$products = Models\Product::all()->categories()->where('category_id', $categoryId)->get();
        $products = Models\Category::find($categoryId)->products()->get();

        $data = [
            'category' => $categoryId,
            'products' => $products
        ];

        return view('listing', $data);
    }
}
