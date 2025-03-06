<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Produit;
use Facade\FlareClient\View;
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
            return back();
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
            $paniy = Str::remove("|produit_" . $request->name, $paniy);
            $request->session()->put('paniy', $paniy);
            // $request->session()->forget('produit_' . $request->name);
            // $request->session()->forget('numberitem_produit_' . $request->name);
            request()->session()->forget('produit_' . $request->name);
            request()->session()->forget('numberitem_produit_' . $request->name);
            // die($request->session()->get('produit_' . $request->name ) );
            // var_dump($paniy);
            // dd($request->session()->get('paniy'));
            if($request->session()->get('paniy') == "")
            request()->session()->forget('paniy');
            
            return redirect()->route('paniypage');
            // return back()->with('successflly', 'Delete by seccessflly');
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
        return redirect(route('home'));
    }

    public function deleteAll(){
        Produit::truncate();
    }

    public function update(Request $request){
        $produit = Produit::find($request->id);

        if(isset($request->name))
        $produit->name = $request->name;

        if(isset($request->imag))
        $produit->imag = $request->imag;

        if(isset($request->description))
        $produit->description = $request->description;

        if(isset($request->prix))
        $produit->prix = $request->prix;

        $produit->save();
    }

    public function updateDetai($id){
        $produit = Produit::find($id);
        return View('updaitp', compact($produit));
    }

    public function categoris(){
        return view();
    }

    public function addCategoris(){
        
        $product = Produit::find(4);
        $product->catigoris()->attach([4, 5, 8]);
    }
}