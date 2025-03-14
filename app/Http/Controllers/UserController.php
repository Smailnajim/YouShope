<?php

namespace App\Http\Controllers;

use App\Models\Produit;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $produits = Produit::all();
        return view('visiter.home', compact('produits'));
    }

    public function all()
    {
        $posts = Produit::all();
        return view('allusers', compact('posts'));
    }

    public function test(){
        return "ana hna";
    }
}
