@extends('admin.layouts')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <div class="flex justify-between items-center mb-5">
                        <h1 class="text-2xl font-bold">Daftar Kategori</h1>
                        <a href="{{ route('category.create') }}"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Tambah Kategori</a>
                    </div>
                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">GAMBAR</th>
                                <th class="px-4 py-2">NAMA</th>
                                <th class="px-4 py-2">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td class="px-4 py-2 text-center">
                                    <img src="{{ Storage::url('public/categories/').$category->image }}" class="rounded"
                                        style="width: 150px">
                                </td>
                                <td class="px-4 py-2 text-center align-middle">{{ $category->name }}</td>
                                <td class="px-4 py-2 text-center align-middle">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="inline-block px-3 py-1 text-white bg-blue-500 rounded hover:bg-blue-600">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-3 py-1 ml-2 text-white bg-red-500 rounded hover:bg-red-600">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-4 py-2 text-center">Data Category belum Tersedia.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
