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

<div class="position-relative">
    <div class="card position-relative top-50 mx-auto mt-5 ms-5" style="width: 60%; height: 80vh; margin-left: 25%;">

        <img  src="{{ $produit->imag }}" class="card-img-top " alt="{{ $produit->name }}" style="width: 600px; height: 400px">
        <h5 class="card-title">{{ $produit->name }}</h5>
        <p class="card-text">{{ $produit->description }}</p>
        <h6 class="text-success">{{ $produit->prix }} $</h6>

        <form action="" method="post">
            <input type="hidden"  name="id" value="{{ $produit->id }}">
            <input type="hidden"  name="name" value="{{ $produit->name }}">
            
            <div class="hstack gap-3">
                <input class="form-control me-auto" name="numberitem" type="number" placeholder="@if (session()->has('numberitem_produit_'. $produit->name )) {{ session()->get('numberitem_produit_'. $produit->name ) }} @else Add your item here... @endif " aria-label="Add your item here...">
                
                @if (session()->has('produit_' .  $produit->name ))
                    <button type="submit" class="btn btn-outline-danger">remove from paniy</button>
                    <div class="vr"></div>
                    <button class="btn btn-primary" type="submit">Update</button>
                @else
                    <button class="btn btn-primary" type="submit">Add to paniy</button>
                @endif                

            </div>
        </form>
    </div>
</div>

@endsection