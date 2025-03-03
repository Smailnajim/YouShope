<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Produit;

use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ProduitController extends Controller
{
    public function create(){
        return view('visiter.create');
    }
    
    public function store(Request $request){
        
        $request->validate([
            'prix'=>'required|gte:0',
            'description'=>'required|max:265',
            'imag'=>'required|max:265',
            'name'=>'required',
        ]);
        $produit = Produit::create($request->all());
        if($produit->wasRecentlyCreated){
            echo 'good!';
        }
    }

    public function readOne(int $id){
        $produit = Produit::find($id);
        return view('visiter.produit_deatai', compact('produit'));
    }


    public function updateitemProduct(Request $request){
        $request->validate([
            'numberitem'=>'required|gte:0',
            'name'=>'required',
        ]);
        $nameProduit = 'numberitem_produit_' . $request->name;
        $request->session()->put($nameProduit, $request->numberitem);
        return back()->with('successflly', 'Update by seccessflly');
    }

    public function deleteitemProduct(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        $paniy = $request->session()->get('paniy');

        if (Str::contains($paniy, "|produit_".$request->name)) {
            $paniy = str_replace("|produit_" . $request->name, "", $paniy);
            $request->session()->put('paniy',  $paniy);
            $request->session()->forget('produit_' . $request->name);
            $request->session()->forget('numberitem_produit_' . $request->name); 
            return back()->with('successflly', 'Delete by seccessflly');
        } else {
            return back()->with('ERROR_GLOBAL', 'This item not fonde in paniy');
        }
    }

    public function seveInSession(Request $request){
        $request->validate([
            'numberitem'=>'required|gte:0',
            'id'=>'required',
            'name'=>'required',
        ]);
        $nameproduit = 'produit_' . $request->name;
        $numberitem = 'numberitem_' . $nameproduit;

        if($request->session()->has($nameproduit)){
            return  back()->with('alredyexist', 'alredy exist');
        }
        $request->session()->put($numberitem, $request->numberitem);
        $request->session()->put($nameproduit, $request->id);

        if(!$request->session()->has('paniy')){
            $paniy = '';
        }else{
            $paniy = $request->session()->get('paniy');
        }

        $paniy = $paniy . '|' . $nameproduit;
        $paniy = $request->session()->put('paniy', $paniy);

        return back()->with('addbygood', 'add to paniy succesfully');
    }

    public function allItemInpaniy(){
        if (!session()->has('paniy')) {
            session()->put('statpaniy', 'empty');
            return view('visiter.paniy');
        }
        
        $paniy = session()->get('paniy');
        $pieces = explode("|", $paniy);
        
        foreach($pieces as $piece){
            $arrayId []= session()->get($piece);
        }
        $produits = Produit::whereIn('id',$arrayId)->get();
        session()->forget('statpaniy');
        return view('visiter.paniy', compact('produits'));

    }

    public function readAll(){
        $produits = Produit::All();
        return view('visiter.produits', compact('produits'));
    }

    public function deleteOne($id){
        $produit = Produit::find($id);
            
        $produit->delete();
        dd($produit);
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