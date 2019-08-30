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
        $data = [
            'category' => $categoryId
        ];

        return view('listing', $data);
    }
}
