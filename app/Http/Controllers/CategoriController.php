<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;

class CategoriController extends Controller
{
    public function create(Request $request){
        return view('categori.create');
    }
    
    public function store(Request $request){
        
        $request->validate([
            'name'=>'required',
        ]);
        Categori::create($request->all());
    }

    public function readOne($id){
        $categori = Categori::find($id);
        return view('categori.categori_deatai', compact('categori'));
    }

    public function readAll(){
        $categoris = Categori::All();
        return view('categori.categoris', compact('categoris'));
    }

    public function deleteOne($id){
        $categori = Categori::find($id);
        $categori->delete();
    }

    public function deleteAll(){
        Categori::truncate();
    }

    public function update(Categori $categori, string $name){

        $categori->name = $name;
        $categori->save();
    }
}
