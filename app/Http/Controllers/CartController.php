<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Product;
use App\Classes\Cart;
use App\Models;

class CartController extends Controller
{
    //
    function cart(Request $request) {
        $cart = Cart::getCart();
        $priceTotal = Cart::getPriceTotal();
        $priceTotalExclTax = Cart::getTotalExclTax();
        $VATPercent = Cart::getVAT() * 100;
        $data = [
            'cart' => $cart,
            'priceTotal' => $priceTotal,
            'priceTotalExclTax' => $priceTotalExclTax,
            'VATPercent' => $VATPercent
        ];
        return view('cart.cart', $data);
    }

    function addToCart(Request $request) {
        $toAddProduct = Models\Product::find($request->productId);

        $product = new Product(
            $request->productId,
            $toAddProduct->product_name,
            $toAddProduct->product_image,
            $request->productCat,
            $toAddProduct->product_price
        );

        $quantity = $request->quantity;
        Cart::addToCart($product, $quantity);
        //$cart = [$product, $quantity];
        //$request->session()->push('cart', $cart);

        return redirect()->route('cart.page');
    }
}
