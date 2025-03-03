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

        @if (session()->has('ERROR_GLOBAL'))
            <div class="bd-callout bd-callout-info">
                <strong>{{ session()->get('ERROR_GLOBAL') }}</strong>
            </div>
        @endif
        <img  src="{{ $produit->imag }}" class="card-img-top " alt="{{ $produit->name }}" style="width: 600px; height: 400px">
        <h5 class="card-title">{{ $produit->name }}</h5>
        <p class="card-text">{{ $produit->description }}</p>
        <h6 class="text-success">{{ $produit->prix }} $</h6>

        <form action="" method="POST">
            @csrf

            <input type="hidden" name="_method" id="formthode" value="POST">
            <input type="hidden"  name="id" value="{{ $produit->id }}">
            <input type="hidden"  name="name" value="{{ $produit->name }}">
            
            <div class="hstack gap-3">
                <input class="form-control me-auto" name="numberitem" type="number" placeholder="@if (session()->has('numberitem_produit_'. $produit->name )) item in paniy: {{ session()->get('numberitem_produit_'. $produit->name ) }} @else Add your item here... @endif " aria-label="Add your item here...">
                
                @if (session()->has('produit_' .  $produit->name ))
                    <button onclick="methodForm('DELETE')" type="submit" class="btn btn-outline-danger">Remove</button>
                    <div class="vr"></div>
                    <button onclick="methodForm('PUT')" class="btn btn-primary" type="submit">Update</button>
                @else
                    <button class="btn btn-primary" type="submit">Add</button>
                    @if (session()->has('alredyexist'))
                        <div class="bd-callout bd-callout-info">
                            <strong>{{ session()->get('alredyexist') }}</strong>
                        </div>
                    @endif
                @endif

            </div>

            @if (session()->has('successflly'))
                <div class="bd-callout bd-callout-info">
                    <strong>{{ session()->get('successflly') }}</strong>
                </div>
            @endif
        </form>
    </div>
</div>

@endsection