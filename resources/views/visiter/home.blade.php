@extends('layouts.hikle')

@section('titel', 'Home')


@section('countent')
    <div class="w-4/5 p-6">
        <div class="grid grid-cols-3 gap-6">
            @foreach ($produits as $produit)
            <div class="col-span-1">
                <div class="bg-white p-6 rounded-lg mb-6">
                    <img alt="Product image" class="rounded-lg mb-4" 
                        src="{{ $produit->imag }}"
                        width="200" style="height: 20vh;"/>
                    <h3 class="text-lg font-bold">
                        {{ $produit->name }}
                    </h3>
                    <a href="/produit/deatai/{{ $produit->id }}" class="btn btn-primary">Show More</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection