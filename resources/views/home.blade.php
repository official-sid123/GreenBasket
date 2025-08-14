    @extends('welcome')

    @section('content')
        <!-- Hero Section -->
        <section class="bg-green-100 py-12 px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-green-800 mb-4">Fresh From the Farm to Your Basket</h1>
            <p class="text-lg text-green-700 mb-6">Shop 100% organic fruits, vegetables, and grains directly from Indian
                farms.
            </p>
            <a href="/products" class="bg-green-600 text-white px-6 py-3 rounded-full hover:bg-green-700 transition">🛒 Shop
                Now</a>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        </section>

        <!-- Categories Section -->
        <section class="py-12 bg-white">
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

        <!-- Featured Products -->
        <section class="py-12 bg-green-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold text-green-800">🔥 Featured Products</h2>
                    <a href="{{ route('products.create') }}"
                        class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
                        ➕ Add Product
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($featuredProducts as $product)
                        <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                            @if ($product->image_url)
                                @if (filter_var($product->image_url, FILTER_VALIDATE_URL))
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                        class="w-full h-40 object-cover rounded-t">
                                @else
                                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                                        class="w-full h-40 object-cover rounded-t">
                                @endif
                            @else
                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center rounded-t">
                                    <span class="text-gray-500">No image</span>
                                </div>
                            @endif
                            <div class="p-4">
                                <h3 class="text-green-800 font-semibold">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-600">₹{{ $product->price }}</p>
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Buy
                                    Now</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Why Choose Us -->
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
