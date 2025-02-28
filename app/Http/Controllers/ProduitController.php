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

    public function readAll(){
        $produits = Produit::All();
        return view('produits', compact('produits'));
    }

    public function deleteOne($id){
        $produit = Produit::find($id);
        if($produit){

        }
        $produit->delete();
    }

    public function deleteAll(){
        Produit::truncate();
    }

    public function update(Produit $produit, array $update){

        if(isset($update['prix']))
            $produit->prix = $update['prix'];

        if(isset($update['description']))
            $produit->description = $update['description'];

        if(isset($update['imag']))
            $produit->imag = $update['imag'];

        if(isset($update['name']))
            $produit->name = $update['name'];

        $produit->save();
    }


    public function categoris(){
        return view();
    }

    public function addCategoris(array $ids, Integer $id_produit){

        $product = Produit::find($id_produit);
        $product->catigoris()->attach($ids);
    }
}