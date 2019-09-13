<?php

namespace App\Classes;

use App\Models;

class Cart
{

    static private $_VAT_Rate = 0.2;

    static function getVAT() {
        return self::$_VAT_Rate;
    }

    static function getCart() {
        return session('cart', []);
    }

    static function getTotalExclTax() {
        return self::getPriceTotal() / (1 + self::$_VAT_Rate);
    }

    static function getPriceTotal() {
        $products = self::getCart();
        $priceTotal = 0;
        foreach ($products as $product) {
            $priceTotal += $product[0]->_price * $product[1];
        }
        return $priceTotal;
    }

    static function addToCart($product, $quantity) {
        $productKey = self::findProductInCartById($product->_id);
        $cartSession = session()->get('cart');
        if ($productKey !== false) {
            $cartSession[$productKey][1] += $quantity;
            session()->forget('cart');
            session()->put('cart', $cartSession);
        } else {
            $cart = [$product, $quantity];
            session()->push('cart', $cart);
        }
    }

    private static function findProductInCartById($productId) {
        $productKey = false;
        foreach (self::getCart() as $key => $value) {
            if ($value[0]->_id === $productId) {
                $productKey = $key;
                break;
            }
        }
        return $productKey;
    }
}
