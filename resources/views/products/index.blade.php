@extends('welcome')

@section('content')
    {{-- // Error Handling Exercise  --}}
    <?php
    // Error Handling Exercise - Undefined Variable
    
    // Intentionally using an undefined variable
    // echo $undefinedVariable;
    ?>

    <?php
    // set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    //     echo "Caught Notice: $errstr in $errfile on line $errline\n";
    //     return true;
    // });
    
    // echo $undefinedVariable;
    
    // restore_error_handler();
    ?>
    <section class="py-12 bg-white">
        {{-- <div class="bg-white p-4 rounded shadow">
            <h1 class="text-2xl font-semibold text-gray-800">
                Login by: {{ Auth::user()->name }}
            </h1>
        </div> --}}

        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-green-800 mb-6 text-center">🌿 Explore Our Categories</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="bg-green-50 p-6 rounded shadow hover:shadow-md transition">
                    <div class="text-3xl">🍎</div>
                    <h3 class="mt-2 font-semibold text-green-700">Fruits</h3>
                </div>
                <div class="bg-green-50 p-6 rounded shadow hover:shadow-md transition">
                    <div class="text-3xl">🥦</div>
                    <h3 class="mt-2 font-semibold text-green-700">Vegetables</h3>
                </div>
                <div class="bg-green-50 p-6 rounded shadow hover:shadow-md transition">
                    <div class="text-3xl">🌾</div>
                    <h3 class="mt-2 font-semibold text-green-700">Grains</h3>
                </div>
                <div class="bg-green-50 p-6 rounded shadow hover:shadow-md transition">
                    <div class="text-3xl">🍃</div>
                    <h3 class="mt-2 font-semibold text-green-700">Organic</h3>
                </div>
            </div>
        </div>
    </section>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-green-800">
            @if (request()->has('category'))
                {{ request()->category }} Products
            @else
                Featured Products
            @endif
        </h2>
        <a href="{{ route('products.create') }}" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
            ➕ Add Product
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($products as $product)
            <div class="bg-white rounded shadow p-4">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-80 object-cover mb-2">
                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                <p>₹{{ $product->price }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="text-green-600 hover:underline">View</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:underline">Edit</a>
                @auth
                    <form action="{{ route('cart.add', $product) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-blue-600 hover:underline">Add to Cart</button>
                    </form>
                @endauth
            </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $products->links() }}
    </div>
    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold text-green-800 mb-6">🌱 Why Choose GreenBascet?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div>
                    <div class="text-3xl mb-2">✅</div>
                    <p class="font-medium text-green-700">Fresh & Organic</p>
                </div>
                <div>
                    <div class="text-3xl mb-2">🚚</div>
                    <p class="font-medium text-green-700">Fast Delivery</p>
                </div>
                <div>
                    <div class="text-3xl mb-2">💰</div>
                    <p class="font-medium text-green-700">Best Prices</p>
                </div>
                <div>
                    <div class="text-3xl mb-2">🌍</div>
                    <p class="font-medium text-green-700">Support Local Farmers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-12 bg-green-100">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold text-green-800 mb-8">💬 What Our Customers Say</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded shadow">
                    <p class="text-gray-700">"Amazing quality and super fresh fruits. Delivery was quick too!"</p>
                    <p class="mt-3 font-semibold text-green-700">— Anjali, Pune</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <p class="text-gray-700">"Love that it supports local farmers. My kids enjoy the taste!"</p>
                    <p class="mt-3 font-semibold text-green-700">— Ramesh, Nashik</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter / CTA -->
    <section class="py-10 bg-green-700 text-white text-center">
        <h2 class="text-2xl font-bold mb-4">Get Weekly Offers & Updates!</h2>
        <form class="max-w-md mx-auto flex gap-2">
            <input type="email" placeholder="Enter your email" class="w-full p-2 rounded text-black" required>
            <button class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500">Subscribe</button>
        </form>
    </section>
@endsection
