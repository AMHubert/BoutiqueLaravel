<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Classes;
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
            $toAddProduct->product_description,
            $toAddProduct->product_image,
            $request->productCat,
            $toAddProduct->product_price
        );

        $quantity = $request->quantity;
        Cart::addToCart($product, $quantity);

        return redirect()->route('cart.page');
    }

    function updateCart(Request $request) {
        $productId = $request->productId;
        $productCategory = $request->productCategory;
        $quantity = $request->quantity;
        Cart::updateCart($productId, $productCategory, $quantity);
        return redirect()->route('cart.page');
    }

    function removeFromCart(Request $request) {
        $productId = $request->productId;
        $productCategory = $request->productCategory;
        Cart::removeFromCart($productId, $productCategory);
        return redirect()->route('cart.page');
    }

    function checkout() {
        if(Auth::check()){
            DB::transaction(function () {
                $order = new Models\Order;
                $user = Auth::user();
                $order->user_id = $user->id;
                $order->user_name = $user->name;
                $order->save();
                $cart = Cart::getCart();

                foreach ($cart as $item) {
                    $product = new Models\ProductOrder;

                    $product->product_name = $item[0]->_name;
                    $product->product_description = $item[0]->_description;
                    $product->product_image = $item[0]->_img;
                    $product->product_price = $item[0]->_price;
                    $product->category_name = $item[0]->_category;
                    $product->order_id = $order->order_id;
                    $product->quantity = $item[1];

                    $product->save();
                }
            });
        }
        else{
            return redirect()->route('login');
        }
    }
}
