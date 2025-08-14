@extends('welcome')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <img src="{{ $product->image_url }}" class="w-full h-full object-cover mb-4">
        <h2 class="text-2xl font-bold text-green-800">{{ $product->name }}</h2>
        <p class="text-gray-700 my-2">₹{{ $product->price }}</p>
        <p class="text-gray-600">{{ $product->description }}</p>
        @auth
            <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf
                <button type="submit" class="text-blue-600 hover:underline">Add to Cart</button>
            </form>
        @endauth
    </div>
@endsection
