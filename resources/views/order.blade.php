@extends('layouts.hikle')

@section('titel', 'Order')

@section('countent')
<div style="display: flex; flex-wrap: wrap; justify-content: space-between">
    @foreach ($orders as $order)
<div style="background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px; width: 300px;">

    <h2 style="margin: 0 0 10px; font-size: 24px; color: #333;">Order Details</h2>

    <p style="margin: 5px 0; color: #555;"><strong>User ID:</strong> {{ $order->user_id }}</p>

    <p style="margin: 5px 0; color: #555;"><strong>Address ID:</strong> {{ $order->addres_id }}</p>

    <p style="margin: 5px 0; color: #555;"><strong>Price:</strong> ${{ number_format($order->prix_order, 2) }}</p>

    <p style="margin: 5px 0; color: #555;"><strong>Number of Items:</strong> {{ $order->number_items }}</p>

    <p style="margin: 5px 0; font-weight: bold; color: #ff9800;"><strong>Status:</strong> {{ $order->status }}</p>

</div>

    @endforeach
</div>
@endsection
