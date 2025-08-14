@extends('welcome')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Add New Product</h2>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"> --}}


    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="block mb-1">Name:</label>
            <input type="text" name="name"
                class="w-full px-3 py-2 border rounded @error('name') border-red-500 @enderror" value="{{ old('name') }}">
            @error('name')
                <span class="text-red-500 text-sm">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Price:</label>
            <input type="number" step="0.01" name="price" class="w-full px-3 py-2 border rounded @error('price') border-red-500 @enderror"
                value="{{ old('price') }}">
            <span class="text-red-500">
                @error('price')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="w-full px-3 py-2 border rounded @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            <span class="text-red-500">
                @error('description')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label>Image URL:</label>
            <input type="text" name="image_url" class="w-full px-3 py-2 border rounded @error('image_url') border-red-500 @enderror"
                value="{{ old('image_url') }}">
            <span class="text-red-500">
                @error('image_url')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label>Category:</label>
            <input type="text" name="category" class="w-full px-3 py-2 border rounded @error('category') border-red-500 @enderror"
                value="{{ old('category') }}">
            <span class="text-red-500">
                @error('category')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                    class="mr-2 @error('is_featured') border-red-500 @enderror">
                <span>Is Featured</span>
            </label>
            @error('is_featured')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
    </form>
@endsection
