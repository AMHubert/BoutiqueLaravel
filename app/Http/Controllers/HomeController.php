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

    public function listing($categorySlug) {
        $category = Models\Category::where('category_slug', $categorySlug)->first(); //Get category by slug
        if(empty($category)){ return view('error.404'); }
        $categoryName = $category->category_name;
        $products = $category->products()->paginate(20);

        $data = [
            'category_name' => $categoryName,
            'products' => $products,
            'isSearch' => false
        ];

        return view('home.listing', $data);
    }

    public function search($searchslug){
        $search = session('search');
        $products = Product::getSearchProduct($search);
        session()->forget('search');

        $data = [
            'products' => $products,
            'search' => $search,
            'isSearch' => true
        ];

        return view('home.listing', $data);
    }

    public function details($categorySlug, $productId) {
        $product = Models\Product::find($productId);
        $category = $product->categories()->where('category_slug', $categorySlug)->first();

        if(empty($product) || empty($category)){ return view('error.404'); }

        $categoryName = $category->category_name;

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
