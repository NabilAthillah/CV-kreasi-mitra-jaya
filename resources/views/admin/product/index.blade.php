@extends('admin.layouts')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <div class="flex justify-between items-center mb-5">
                        <h1 class="text-2xl font-bold">Daftar Product</h1>
                        <a href="{{ route('product.create') }}"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Tambah Product</a>
                    </div>
                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">GAMBAR</th>
                                <th class="px-4 py-2">NAMA</th>
                                <th class="px-4 py-2">HARGA</th>
                                <th class="px-4 py-2">STOK</th>
                                <th class="px-4 py-2 max-w-[480px]">DESKRIPSI</th>
                                <th class="px-4 py-2">KATEGORI</th>
                                <th class="px-4 py-2">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td class="px-4 py-2">
                                    <img src="{{ Storage::url('public/products/').$product->image }}"
                                        class="w-24 h-auto rounded" alt="{{ $product->name }}">
                                </td>
                                <td class="px-4 py-2 text-center align-middle">{{ $product->name }}</td>
                                <td class="px-4 py-2 text-center align-middle">{{ $product->price }}</td>
                                <td class="px-4 py-2 text-center align-middle">{{ $product->stock }}</td>
                                <td class="px-4 py-2 text-center align-middle flex flex-wrap overflow-y-auto w-full max-h-[200px]">
                <div class="text-left">{{ $product->description }}</div>
            </td>
                                <td class="px-4 py-2 text-center align-middle">{{ $product->category->name }}</td>
                                <td class="px-4 py-2 text-center align-middle">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        <a href="{{ route('product.edit', $product->id) }}"
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
                                <td colspan="7" class="px-4 py-2 text-center">Data Product belum Tersedia.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
