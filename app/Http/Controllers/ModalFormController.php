<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Classes\Product;
use App\Models;

class ModalFormController extends Controller
{
    //
    function updateGameModal(Request $request){
        $id = $request->id;

        $game = Models\Product::with('categories')->find($id);
        $categories = Models\Category::all();
        $data = [
            'game' => $game,
            'categories' => $categories
        ];

        return view('Admin.modal.gameupdate', $data)->render();
    }
}
