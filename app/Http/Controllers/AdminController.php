<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models;

class AdminController extends Controller
{

    function index(){
        return view('admin.index');
    }

    function login(){
        return view('admin.login');
    }

    function verifyLogin(Request $request){
        if(Auth::attempt(['email' => $request->loginEmail, 'password' => $request->loginPassword, 'isAdmin' => 1])){
            return redirect()->route('admin.index');
        }else{
            return view('admin.login');
        }
    }

    function gameForm(){
        $categories = Models\Category::all();

        return view('admin.admin', compact($categories));
    }

    function addGame(Request $request){
        // Création d'un nouveau produit
        $product = new Models\Product;
        // Remplissage des champs
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->product_stock = $request->product_stock;

        $product->save();

        $categories = $request->categories;
        // Ajout de catégorie correspondant
        $product->categories()->attach($categories);
    }
}
