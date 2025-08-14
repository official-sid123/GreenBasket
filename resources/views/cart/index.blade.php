@extends('welcome')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-green-800 mb-6">Your Shopping Cart</h1>
    
    @if($cartItems->isEmpty())
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-700">Your cart is empty.</p>
            <a href="{{ route('products.index') }}" class="text-green-600 hover:underline mt-4 inline-block">
                Continue Shopping
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <div class="bg-white rounded shadow">
                    @foreach($cartItems as $item)
                    <div class="p-4 border-b flex items-center">
                        <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" 
                             class="w-20 h-20 object-cover mr-4">
                        <div class="flex-grow">
                            <h3 class="font-semibold">{{ $item->product->name }}</h3>
                            <p class="text-gray-600">₹{{ $item->product->price }}</p>
                        </div>
                        <div class="flex items-center">
                            <form action="{{ route('cart.update', $item) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                       min="1" class="w-16 text-center border rounded">
                            </form>
                            <form action="{{ route('cart.remove', $item) }}" method="POST" class="ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-semibold text-lg mb-4">Order Summary</h3>
                <div class="flex justify-between mb-2">
                    <span>Subtotal</span>
                    <span>₹{{ number_format($total, 2) }}</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span>Shipping</span>
                    <span>Free</span>
                </div>
                <div class="border-t pt-4">
                    <div class="flex justify-between font-semibold">
                        <span>Total</span>
                        <span>₹{{ number_format($total, 2) }}</span>
                    </div>
                </div>
                <a href="#" class="block bg-green-700 text-white text-center py-2 rounded mt-6 hover:bg-green-800">
                    Proceed to Checkout
                </a>
                <a href="{{ route('products.index') }}" class="block text-center text-green-700 mt-2 hover:underline">
                    Continue Shopping
                </a>
            </div>
        </div>
    @endif
</div>
@endsection