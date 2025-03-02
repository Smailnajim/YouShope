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
            
            @if (!session()->has('produit_' . {{ $produit->name }}))
            <button class="btn btn-primary" type="submit">Add to paniy</button>
            @else
            <button class="btn btn-primary" type="submit">remove from paniy</button>
            @endif
            
            <div class="hstack gap-3">
                <input class="form-control me-auto" name="numberitem" type="number" placeholder="@if (session()->has('numberitem_produit_'.{{ $produit->name }}))) @else @endif " aria-label="Add your item here...">
                
                @if (session()->has('produit_' . {{ $produit->name }}))
                <button type="button" class="btn btn-outline-danger">Delete</button>
                <div class="vr"></div>
                @endif

                <button type="button" class="btn btn-secondary">Submit</button>
                

            </div>
        </form>
    </div>
</div>

@endsection