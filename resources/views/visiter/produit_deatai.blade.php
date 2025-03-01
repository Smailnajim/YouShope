@extends('layouts.hikle')

@section('titel', 'detai')
@section('nav')
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <a href="/home" class="btn">Home</a>
        <a href="/login" class="btn">Login</a>
        <a href="/register" class="btn">Register</a>
        <a href="/panier" class="btn"><i class="fa-solid fa-store"></i></a>
    </nav>
@endsection

@section('countent')
<div position-relative>
    <div class="card position-absolute top-50 start-50 translate-middle mt-5" style="width: 60%; height: 80vh;">
        <img src="{{ $produit->imag }}" class="card-img-top" alt="{{ $produit->name }}" style="width: 600px; height: 400px">
        <h5 class="card-title">{{ $produit->name }}</h5>
        <p class="card-text">{{ $produit->description }}</p>
        <h6 class="text-success">{{ $produit->prix }} $</h6>
        <form action="" method="post">
            <input type="hidden"  name="id" value="{{ $produit->id }}">
            <input type="hidden"  name="name" value="{{ $produit->name }}">
            <button class="btn btn-primary" type="submit">Add to paniy</button>
        </form>
    </div>
</div>

@endsection