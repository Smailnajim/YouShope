@extends('layouts.hikle')

@section('titel', 'Home')
@section('nav')
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <a href="/home" class="btn">Home</a>
        <a href="/login" class="btn">Login</a>
        <a href="/register" class="btn">Register</a>
        <a href="/panier" class="btn"><i class="fa-solid fa-store"></i></a>
    </nav>
@endsection

@section('countent')
    <div class="container overflow-hidden text-center mt-5">
        <div class="row gy-5">      
            @foreach ($produits as $produit)
            <div class="card" style="width: 18rem;">
                <img src="{{ $produit->imag }}" class="card-img-top" alt="Product Image" style="width: 260px; height: 195px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $produit->name }}</h5>
                    <a href="/produit/deatai/{{ $produit->id }}" class="btn btn-primary">Show More</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection