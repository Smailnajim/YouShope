<?php

namespace App\Http\Controllers;

use App\Models\Produit;

use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

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

    public function readOne($id){
        $produit = Produit::find($id);
        return view('produit_deatai', compact('produit'));
    }
}
