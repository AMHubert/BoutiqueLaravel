<?php

namespace App\Classes;

use App\Models;
use Illuminate\Support\Facades\Auth;

class Order
{

    static function getAllUserOrder($userId){
        $orders = Models\Order::where('user_id', Auth::id())->get();

        return $orders;
    }
}
