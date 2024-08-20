@extends('admin.layouts')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 font-bold mb-2">GAMBAR</label>
                            <input type="file" id="image" name="image" class="w-full p-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">NAMA</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Masukkan Nama Kategori" class="w-full p-2 border rounded">
                            @error('name')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                UPDATE
                            </button>
                            <button type="reset" class="ml-4 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                RESET
                            </button>
                            <a href="/admin/category" class="ml-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">KEMBALI</a>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

@stop