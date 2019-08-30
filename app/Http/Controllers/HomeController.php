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

        return view('home', ['categories' => $categories, 'products' => $products, 'isLogged' => $isLogged]);
    }

    public function listing($categoryId) {
        return view('listing', ['category' => $categoryId]);
    }
}
