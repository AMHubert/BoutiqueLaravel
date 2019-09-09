<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Order;
use App\Classes\Product;
use App\Models;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index() {
        $categories = Models\Category::all();
        //$products = Models\Product::all();

        $productsCat = Product::getHighlight();

        $data = [
            'categories' => $categories,
            'productsCat' => $productsCat
        ];

        return view('home.home', $data);
    }

    public function listing($categoryName) {
        $categoryName = str_replace("-", " ", $categoryName);
        $category = Models\Category::all()->where('category_name', $categoryName)->first(); //Get category by name
        if(empty($category)){ return view('error.404'); }
        $categoryName = $category->category_name;
        $products = $category->products()->get();

        $data = [
            'category_name' => $categoryName,
            'products' => $products,
            'isSearch' => false
        ];

        return view('home.listing', $data);
    }

    public function search(Request $request){

        $products = Product::getSearchProduct($request->search);

        $data = [
            'products' => $products,
            'isSearch' => true
        ];

        return view('home.listing', $data);
    }

    public function details($categoryName, $productId) {
        $categoryName = str_replace("-", " ", $categoryName);
        $product = Models\Product::find($productId);
        $category = Models\Category::all()->where('category_name', $categoryName)->first();

        if(empty($product) || empty($category)){ return view('error.404'); }

        $data = [
            'category_name' => $categoryName,
            'product' => $product
        ];
        return view('home.details', $data);
    }

    public function account()
    {
        $user = Auth::user();
        $orders = Order::getAllUserOrder($user->id);

        $data = [
            "user" => $user,
            'orders' => $orders
        ];

        return view('home.account', $data);
    }
}
