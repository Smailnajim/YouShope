@extends('layouts.hikle')

@section('titel', 'paniy')


@section('countent')
    @if (session()->has('statpaniy'))
        <div class="position-absolute top-50 start-50 translate-middle" style="width: 40vw">
            <span class="placeholder col-6"></span>
            <span class="placeholder w-75"></span>
            <span class="placeholder" style="width: 25%;"></span>
        </div>
    @else
    <div style="position: relative;top: 25%" class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h2 class="text-xl font-semibold mb-4">
            paniy
        </h2>
                            <div class="space-y-4">
                                <div>
                                    <p>prix total : {{ session()->get('prixorder') }} Dh</p>
                                    <p>number produit :{{ session()->get('numberproduit') }}</p>
                                </div>
                                @foreach ($produits as $produit)
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            <img alt="Profile picture of Sophie B." class="w-12 h-12 rounded-full" height="50"
                                                src="{{ $produit->imag }}"
                                                width="50" />
                                            <div>
                                                <p class="font-semibold">
                                                    {{ $produit->name }}
                                                </p>
                                                <p class="text-gray-500">
                                                    {{ $produit->prix }}
                                                </p>
                                            </div>
                                        </div>
                                        <a class="text-orange-500 font-semibold" href="/produit/deatai/{{ $produit->id }}">
                                            More
                                        </a>
                                    </div>
                                @endforeach
                            </div>
        
    @endif
@endsection