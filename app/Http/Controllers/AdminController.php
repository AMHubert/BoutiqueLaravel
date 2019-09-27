<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models;
use App\User;

class AdminController extends Controller
{

    function index(){
        $data = [
            'pageTitle' => "Espace Admin"
        ];
        return view('admin.index', $data);
    }

    function login($error = null){
        $msg = "";
        if(!empty($error)){
            $msg = "Veuillez vous connecter avec un compte admin";
        }

        return view('admin.login', ['msg' => $msg]);
    }

    function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    function verifyLogin(Request $request){
        if(Auth::attempt(['email' => $request->loginEmail, 'password' => $request->loginPassword, 'isAdmin' => 1])){
            return redirect()->route('admin.index');
        }else{
            return view('admin.login');
        }
    }

    function gameList(){
        $games = Models\Product::with('categories')->paginate(25);
        $categories = Models\Category::all();
        $data = [
            'games' => $games,
            'categories' => $categories,
            'pageTitle' => "Liste des jeux"
        ];
        return view('admin.gamelist', $data);
    }

    function addGame(Request $request){

        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required',
            'categories' => 'required'
        ]);

        // Création d'un nouveau produit
        $product = new Models\Product;
        // Remplissage des champs
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        if(!empty($request->product_imageBoxArt)){
            $img_name = Str::camel($request->product_name) .".". $request->product_imageBoxArt->getClientOriginalExtension();
            $request->product_imageBoxArt->move(public_path('resources/img/game/gameBoxArt'), $img_name);
            $request->product_imageSquare->move(public_path('resources/img/game/gameSquare'), $img_name);
            $product->product_image = $img_name;
        }
        $product->product_price = $request->product_price;
        $product->product_stock = $request->product_stock;
        $product->product_highlighted = $request->product_highlighted;

        $product->save();

        $categories = $request->categories;
        // Ajout de catégorie correspondant
        $product->categories()->attach($categories);

        return redirect()->route('admin.game.list');
    }

    function updateGame(Request $request){

        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required',
            'categories' => 'required'
        ]);

        $game = Models\Product::find($request->product_id);

        $game->product_name = $request->product_name;
        $game->product_description = $request->product_description;
        if(!empty($request->product_imageBoxArt)){
            $img_name = Str::camel($request->product_name) .".". $request->product_imageBoxArt->getClientOriginalExtension();
            $request->product_imageBoxArt->move(public_path('resources/img/game/gameBoxArt'), $img_name);
            $request->product_imageSquare->move(public_path('resources/img/game/gameSquare'), $img_name);
            $game->product_image = $img_name;
        }
        $game->product_price = $request->product_price;
        $game->product_stock = $request->product_stock;
        $game->product_highlighted = $request->product_highlighted;

        $game->save();

        $categories = $request->categories;
        // Ajout de catégorie correspondant
        $game->categories()->detach();
        $game->categories()->attach($categories);

        return redirect()->route('admin.game.list');
    }

    function deleteGame($id){
        $game = Models\Product::find($id);
        $game->categories()->detach();
        $game->delete();

        return redirect()->route('admin.game.list');
    }

    function categoryList(){
        $categories = Models\Category::all();
        $data = [
            'categories' => $categories,
            'pageTitle' => "Liste des categories"
        ];
        return view('admin.categorylist', $data);
    }

    function addCategory(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required',
            'category_description' => 'required'
        ]);


        // Création d'un nouveau produit
        $category = new Models\Category;
        // Remplissage des champs
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;

        $category->save();

        return redirect()->route('admin.category.list');
    }

    function adminList(){
        $admins = User::where('isAdmin', 1)->get();

        $data = [
            'admins' => $admins,
            'pageTitle' => "Liste des jeux"
        ];
        return view('admin.adminlist', $data);
    }

    function addAdmin(Request $request){
        $validatedData = $request->validate([
            'admin_name' => 'required',
            'admin_email' => 'required',
            'admin_pass' => 'required|min:8'
        ]);


        // Création d'un nouveau produit
        $admin = new User;
        // Remplissage des champs
        $admin->name = $request->admin_name;
        $admin->email = $request->admin_email;
        $admin->password = Hash::make($request->admin_pass);
        $admin->isAdmin = 1;

        $admin->save();

        return redirect()->route('admin.admin.list');
    }
}
