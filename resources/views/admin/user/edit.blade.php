@extends('admin.layouts')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">NAMA</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Masukkan Nama User" class="w-full p-2 border rounded">
                            @error('name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-bold mb-2">EMAIL</label>
                            <input type="text" id="email" name="email" placeholder="Masukkan Email User" value="{{ old('email', $user->email) }}" class="w-full p-2 border rounded">
                            @error('email')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 font-bold mb-2">ROLE</label>
                            <select name="role" id="role" class="w-full p-2 border rounded">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                            </select>
                            @error('role')
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