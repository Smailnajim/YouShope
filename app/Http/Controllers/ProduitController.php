<?php

namespace App\Http\Controllers;

use app\Models\Produit;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function create(Request $request){
        return view('create');
    }

    public function store(Request $request){
        
        $request->validate([
            'prix'=>'required',
            'description'=>'required|max:255',
            'imag'=>'required',
            'name'=>'required', 	
        ]);
        Produit::create($request->all());
    }
}
