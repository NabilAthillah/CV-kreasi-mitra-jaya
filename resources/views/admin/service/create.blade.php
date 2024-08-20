@extends('admin.layouts')

@section('content')
<div class="container mt-5 mb-5">
    <div class="mx-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">GAMBAR</label>
                    <input type="file" id="image" name="image" class="w-full p-2 border rounded">
                    @error('image')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">NAMA</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Masukkan Nama Servis" class="w-full p-2 border rounded">
                    @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">DESKRIPSI</label>
                    <textarea id="description" name="description" placeholder="Masukkan Deskripsi Servis"
                        class="w-full p-2 border rounded">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        SIMPAN
                    </button>
                    <button type="reset"
                        class="ml-4 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        RESET
                    </button>
                    <a href="/admin/service"
                        class="ml-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">KEMBALI</a>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
