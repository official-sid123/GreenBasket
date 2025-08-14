@extends('welcome')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Add New Product</h2>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"> --}}


    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name"
                class="w-full px-3 py-2 border rounded @error('name') border-red-500 @enderror"
                value="{{ old('name', $product->name) }}">
            <span class="text-red-500">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label>Price:</label>
            <input type="number" step="0.01" name="price"
                class="w-full px-3 py-2 border rounded @error('price') border-red-500 @enderror"
                value="{{ old('price', $product->price) }}">
            <span class="text-red-500">
                @error('price')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="w-full px-3 py-2 border rounded @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
            <span class="text-red-500">
                @error('description')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-6">
            <label for="image_url" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>

            <!-- Image Preview -->
            <div class="mb-3">
                @if ($product->image_url)
                    <div class="relative group">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                            class="w-full h-48 object-contain rounded-md border border-gray-200 bg-gray-50">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="text-white text-sm font-medium">Current Image</span>
                        </div>
                    </div>
                @else
                    <div
                        class="w-full h-48 flex items-center justify-center bg-gray-100 rounded-md border border-dashed border-gray-300">
                        <span class="text-gray-500">No image available</span>
                    </div>
                @endif
            </div>

            <!-- Input Field -->
            <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <input type="url" id="image_url" name="image_url" value="{{ old('image_url', $product->image_url) }}"
                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-2 border"
                    placeholder="https://example.com/image.jpg">
            </div>

            <!-- Error Message -->
            @error('image_url')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror

            <p class="mt-1 text-xs text-gray-500">
                Enter a valid URL pointing to the product image (JPEG, PNG, etc.)
            </p>
        </div>
        <div class="mb-3">
            <label>Category:</label>
            <input type="text" name="category"
                class="w-full px-3 py-2 border rounded @error('category') border-red-500 @enderror"
                value="{{ old('category', $product->category) }}">
            <span class="text-red-500">
                @error('category')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_featured" value="1"
                    {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                    class="mr-2 @error('is_featured') border-red-500 @enderror">
                <span>Is Featured</span>
            </label>
            @error('is_featured')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
