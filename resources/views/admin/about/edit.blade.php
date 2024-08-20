@extends('admin.layouts')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="vision" class="block text-gray-700 font-bold mb-2">VISI</label>
                            <input type="text" id="vision" name="vision" value="{{ old('vision', $about->vision) }}" placeholder="Masukkan Visi Perusahaan" class="w-full p-2 border rounded">
                            @error('vision')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="mission" class="block text-gray-700 font-bold mb-2">MISI</label>
                            <input type="text" id="mission" name="mission" value="{{ old('mission', $about->mission) }}" placeholder="Masukkan Misi Perusahaan" class="w-full p-2 border rounded">
                            @error('mission')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="short_company_description" class="block text-gray-700 font-bold mb-2">DESKRIPSI</label>
                            <input type="text" id="short_company_description" name="short_company_description" value="{{ old('short_company_description', $about->short_company_description) }}" placeholder="Masukkan Deskripsi Pendek Perusahaan" class="w-full p-2 border rounded">
                            @error('short_company_description')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="long_company_description" class="block text-gray-700 font-bold mb-2">DESKRIPSI PANJANG</label>
                            <textarea id="long_company_description" name="long_company_description" placeholder="Masukkan Deskripsi Panjang Perusahaan" class="w-full p-2 border rounded" value="{{ old('long_company_description', $about->long_company_description) }}">{{ old('long_company_description', $about->long_company_description) }}</textarea>
                            @error('long_company_description')
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
                            <a href="/admin/about" class="ml-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">KEMBALI</a>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>


@stop