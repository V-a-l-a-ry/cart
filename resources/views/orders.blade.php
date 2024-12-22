@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Orders</h2>
    <ul class="list-disc pl-5">
        @foreach ($orders as $order)
            <li>Order ID: {{ $order->id }}, Items: {{ $order->items }}</li>
        @endforeach
    </ul>
</div>
@endsection