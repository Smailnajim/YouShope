<?php

namespace App\Http\Controllers;

use App\Models\Produit;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $produits = Produit::all();
        return view('visiter.home', ['produits'=>$produits]);
    }
}
