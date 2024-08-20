@extends('admin.layouts')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 font-bold mb-2">GAMBAR</label>
                            <input type="file" id="image" name="image" class="w-full p-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">NAMA</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Masukkan Nama Product" class="w-full p-2 border rounded">
                            @error('name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 font-bold mb-2">HARGA</label>
                            <input type="number" id="price" name="price" placeholder="Masukkan Harga Product" value="{{ old('price', $product->price) }}" class="w-full p-2 border rounded">
                            @error('price')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="stock" class="block text-gray-700 font-bold mb-2">STOK</label>
                            <input type="number" id="stock" name="stock" placeholder="Masukkan Stok Product" value="{{ old('stock', $product->stock) }}" class="w-full p-2 border rounded">
                            @error('stock')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-bold mb-2">DESKRIPSI</label>
                            <textarea id="description" name="description" placeholder="Masukkan Deskripsi Product" class="w-full p-2 border rounded" value="{{ old('description', $product->description) }}">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 font-bold mb-2">KATEGORI</label>
                            <select name="category" id="category" class="w-full p-2 border rounded">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                UPDATE
                            </button>
                            <button type="reset" class="ml-4 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                RESET
                            </button>
                            <a href="/admin/product" class="ml-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">KEMBALI</a>
                        </div>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@stop