@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Order #{{ $order->id }}</h1>
        <p>Customer: {{ $order->customer->name }}</p>
        <p>Status: {{ $order->status }}</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Garment</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->garment->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity * $item->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Grand Total: {{ $order->items->sum(function ($item) {return $item->quantity * $item->price;}) }}</p>
    </div>
@endsection
