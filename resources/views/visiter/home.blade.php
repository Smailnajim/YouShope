@extends('layouts.hikle')

@section('titel', 'Home')


@section('countent')
<div class="container mx-auto p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($produits as $produit)
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <img alt="Product image showing {{ $produit->name }}" class="rounded-lg mb-4 w-full h-48 object-cover" 
                    src="{{ $produit->imag }}"/>
                <h3 class="text-xl font-bold mb-2">
                    {{ $produit->name }}
                </h3>
                <p class="text-gray-700 mb-4">
                    {{ Str::limit($produit->description, 100) }}
                </p>
                <div class="flex justify-between items-center mb-4">
                    <form action="{{ route('savesesion', ['id'=>$produit->id]) }}" method="post">
                        @csrf
                        <input type="hidden"  name="id" value="{{ $produit->id }}">
                        <input type="hidden"  name="name" value="{{ $produit->name }}">
                        <input type="hidden"  name="prix" value="{{ $produit->prix }}">
                        @if (session()->has('produit_' .  $produit->name))
                            <a href="/produit/deatai/{{ $produit->id }}" class="text-blue-500 hover:text-blue-700 font-semibold">Show More</a>
                        @else
                            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                                <i class="fas fa-shopping-cart mr-2"></i>Add to Panier
                            </button>
                        @endif
                    </form>
                    <span class="text-gray-900 font-bold">Dh {{ $produit->prix }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

