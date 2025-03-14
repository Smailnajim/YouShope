@extends('layouts.hikle')

@section('titel', 'detai')

@section('countent')

<div class="w-4/5 p-6">
    <div class="grid grid-cols-3 gap-6">
        @if (session()->has('ERROR_GLOBAL'))
            <div class="bd-callout bd-callout-info">
                <strong>{{ session()->get('ERROR_GLOBAL') }}</strong>
            </div>
        @endif
        <div class="col-span-1">
            <div class="bg-white p-6 rounded-lg mb-6">
                <img alt="Product image" class="rounded-lg mb-4" 
                    src="{{ $produit->imag }}"
                    width="200" style="height: 20vh;"/>
                <h5 class="card-title">{{ $produit->name }}</h5>
                <p class="card-text">{{ $produit->description }}</p>
                <h6 class="text-success">{{ $produit->prix }} DH</h6>
                <form action="" method="POST">
                    @csrf
        
                    <input type="hidden" name="_method" id="formthode" value="POST">
                    <input type="hidden"  name="id" value="{{ $produit->id }}">
                    <input type="hidden"  name="prix" value="{{ $produit->prix }}">
                    <input type="hidden"  name="name" value="{{ $produit->name }}">
                    
                    <div class="hstack gap-3">
                        <input class="form-control me-auto" name="numberitem" type="number" placeholder="@if (session()->has('numberitem_produit_'. $produit->name )) item in paniy: {{ session()->get('numberitem_produit_'. $produit->name ) }} @else Add your item here... @endif " aria-label="Add your item here...">

                    </div><br>
                    @if (session()->has('produit_' .  $produit->name))
                        <button onclick="methodForm('DELETE')" type="submit" class="btn btn-outline-danger">Remove</button>
                        <div class="vr"></div>
                        <button onclick="methodForm('PUT')" class="btn btn-primary" type="submit">Update your paniy</button>
                        <p></p>
                    @else
                        <button class="btn btn-primary" type="submit">Add To paniy</button>
                        <div class="vr"></div>
                        <a href="/produit/update/{{ $produit->id }}" class="btn btn-primary" type="submit">Modifier</a>
                        <p></p>
                        @if (session()->has('alredyexist'))
                            <div class="bd-callout bd-callout-info">
                                <strong>{{ session()->get('alredyexist') }}</strong>
                            </div>
                        @endif
                    @endif
                    <br> 
                    <a href="/produit/delete/{{ $produit->id }}" class="btn btn-primary" type="submit">delete this</a>
        
                    @if (session()->has('successflly'))
                        <div class="bd-callout bd-callout-info">
                            <strong>{{ session()->get('successflly') }}</strong>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

