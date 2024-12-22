@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Cart</h2>
    <div class="mb-4">
        <form action="/cart/add" method="POST">
            @csrf
            <input type="text" name="name" class="border rounded p-2 w-full" placeholder="Enter item name">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Add to Cart</button>
        </form>
    </div>
    <ul class="list-disc pl-5">
        @foreach ($cart as $item)
            <li>{{ $item['name'] ?? 'Unnamed Item' }}
                <form action="/cart/remove/{{ $item['id'] ?? 0 }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2">Remove</button>
                </form>
            </li>
        @endforeach
    </ul>
    <form action="/cart/place-order" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Place Order</button>
    </form>

    <h2 class="text-xl font-bold mt-8 mb-4">E-Marketplace - Electronics</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Hardcoded Electronics Products -->
        <div class="bg-gray-100 rounded shadow p-4">
            <h3 class="text-lg font-bold">Smartphone</h3>
            <p class="text-gray-600">High-end smartphone with 128GB storage.</p>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="name" value="Smartphone">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded mt-2">Add to Cart</button>
            </form>
        </div>
        <div class="bg-gray-100 rounded shadow p-4">
            <h3 class="text-lg font-bold">Laptop</h3>
            <p class="text-gray-600">Powerful laptop with 16GB RAM and 512GB SSD.</p>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="name" value="Laptop">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded mt-2">Add to Cart</button>
            </form>
        </div>
        <div class="bg-gray-100 rounded shadow p-4">
            <h3 class="text-lg font-bold">Smart TV</h3>
            <p class="text-gray-600">4K Ultra HD Smart TV with streaming apps.</p>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="name" value="Smart TV">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded mt-2">Add to Cart</button>
            </form>
        </div>
        <div class="bg-gray-100 rounded shadow p-4">
            <h3 class="text-lg font-bold">Headphones</h3>
            <p class="text-gray-600">Noise-canceling over-ear headphones.</p>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="name" value="Headphones">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded mt-2">Add to Cart</button>
            </form>
        </div>
        <div class="bg-gray-100 rounded shadow p-4">
            <h3 class="text-lg font-bold">Smartwatch</h3>
            <p class="text-gray-600">Feature-packed smartwatch with fitness tracking.</p>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="name" value="Smartwatch">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded mt-2">Add to Cart</button>
            </form>
        </div>
        <div class="bg-gray-100 rounded shadow p-4">
            <h3 class="text-lg font-bold">Gaming Console</h3>
            <p class="text-gray-600">Latest generation gaming console.</p>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="name" value="Gaming Console">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded mt-2">Add to Cart</button>
            </form>
        </div>
        <div class="bg-gray-100 rounded shadow p-4">
            <h3 class="text-lg font-bold">Tablet</h3>
            <p class="text-gray-600">Lightweight tablet with 10-inch screen.</p>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="name" value="Tablet">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded mt-2">Add to Cart</button>
            </form>
        </div>
        <div class="bg-gray-100 rounded shadow p-4">
            <h3 class="text-lg font-bold">Bluetooth Speaker</h3>
            <p class="text-gray-600">Portable Bluetooth speaker with excellent sound.</p>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="name" value="Bluetooth Speaker">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded mt-2">Add to Cart</button>
            </form>
        </div>
        <div class="bg-gray-100 rounded shadow p-4">
            <h3 class="text-lg font-bold">Camera</h3>
            <p class="text-gray-600">DSLR camera with 24MP resolution.</p>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="name" value="Camera">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded mt-2">Add to Cart</button>
            </form>
        </div>
        <div class="bg-gray-100 rounded shadow p-4">
            <h3 class="text-lg font-bold">Wireless Charger</h3>
            <p class="text-gray-600">Fast wireless charger compatible with most devices.</p>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="name" value="Wireless Charger">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded mt-2">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
@endsection
