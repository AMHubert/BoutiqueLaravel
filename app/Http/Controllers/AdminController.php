<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class AdminController extends Controller
{

    function index(){

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
