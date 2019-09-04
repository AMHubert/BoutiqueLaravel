<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class CartController extends Controller
{
    //
    function cart() {
        return view('cart.cart');
    }

    function addToCart($category, $product) {
        $success = true;
        if($success){
            return redirect()->route('cartpage');
        }

    }
}
