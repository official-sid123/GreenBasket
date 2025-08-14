<aside id="sidebar" class="bg-green-100 w-64 p-4 md:translate-x-0 transition-transform duration-300 ease-in-out">
    <h2 class="text-lg font-bold text-green-800 mb-4 flex items-center gap-2">🌿 Categories</h2>
    <ul class="space-y-3 text-green-900 font-medium">
        <li><a href="{{ route('products.index', ['category' => 'Fruits']) }}"
                class="flex items-center gap-2 hover:text-green-600 hover:bg-green-50 p-2 rounded"><span
                    class="text-xl">🍎</span> Fruits</a></li>
        <li><a href="{{ route('products.index', ['category' => 'Vegetables']) }}"
                class="flex items-center gap-2 hover:text-green-600 hover:bg-green-50 p-2 rounded"><span
                    class="text-xl">🥦</span> Vegetables</a></li>
        <li><a href="{{ route('products.index', ['category' => 'Grains']) }}"
                class="flex items-center gap-2 hover:text-green-600 hover:bg-green-50 p-2 rounded"><span
                    class="text-xl">🌾</span> Grains</a></li>
        <li><a href="{{ route('products.index', ['category' => 'Organic']) }}"
                class="flex items-center gap-2 hover:text-green-600 hover:bg-green-50 p-2 rounded"><span
                    class="text-xl">🍃</span> Organic</a></li>
        <li><a href="{{ route('products.index') }}"
                class="flex items-center gap-2 hover:text-green-600 hover:bg-green-50 p-2 rounded"><span
                    class="text-xl">🔥</span> All Products</a></li>
    </ul>
    <form action="{{ route('users.logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit"
            class="flex items-center gap-2 px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 transition ml-8 mt-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m0 14a9 9 0 100-18 9 9 0 000 18z"></path>
            </svg>
            Logout
        </button>
    </form>
</aside>
