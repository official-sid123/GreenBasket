<header class="bg-green-700 text-white shadow-md">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3">
        <div class="flex items-center gap-4">
            <!-- Toggle Button -->
            <button id="sidebarToggle" class="text-white focus:outline-none text-2xl">
                ☰
            </button>
            <h1 class="text-2xl font-bold">🌿 GreenBascet</h1>
        </div>

        <!-- Search Bar -->
        <div class="flex-1 mx-4 hidden md:block">
            <form action="{{ route('products.index') }}" method="GET" class="relative">
                <input type="text" name="search" placeholder="Search products..."
                    class="w-full py-1 px-4 rounded-full text-black focus:outline-none border"
                    value="{{ request('search') }}">
                <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                    🔍
                </button>
            </form>
        </div>

        <!-- Navigation + Profile -->
        <div class="flex items-center gap-6">
            <nav class="space-x-6 hidden md:flex">
                <a href="{{ route('products.index') }}" class="hover:text-yellow-300">Home</a>
                <a href="/products" class="hover:text-yellow-300">Products</a>
                <a href="{{ route('about') }}" class="hover:text-yellow-300">About Us</a>
                <a href="{{ route('contact') }}" class="hover:text-yellow-300">Contact</a>
                <a href="{{ route('cart.index') }}"
                    class="cart-animation bg-yellow-400 px-3 py-1 rounded hover:bg-yellow-500 text-black font-medium transition-all">🛒
                    Cart</a>
            </nav>

            <!-- Profile Dropdown -->
            <div class="relative">
                <button id="profileToggle" class="flex items-center gap-2 focus:outline-none">
                    <img src="{{ asset('/storage/' . auth()->user()->image_url) }}" alt="Profile" class="w-12 h-12 rounded-full border">
                    <span class="hidden md:inline">{{ Auth::user()->name ?? 'Guest' }}</span>
                </button>

                <!-- Dropdown Menu -->
                <div id="profileMenu" class="absolute right-0 mt-2 w-40 bg-white text-black rounded shadow-lg hidden">
                    @auth
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('users.logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                        </form>
                    @else
                        <a href="" class="block px-4 py-2 hover:bg-gray-100">Login</a>
                        <a href="" class="block px-4 py-2 hover:bg-gray-100">Register</a>
                    @endauth
                </div>
            </div>

        </div>
    </div>
    
</header>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const profileToggle = document.getElementById('profileToggle');
    const profileMenu = document.getElementById('profileMenu');

    profileToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      profileMenu.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
      if (!profileMenu.classList.contains('hidden')) {
        profileMenu.classList.add('hidden');
      }
    });
  });
</script>
