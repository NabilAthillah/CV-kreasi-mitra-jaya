@extends('admin.layouts')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <div class="flex justify-between items-center mb-5">
                        <h1 class="text-2xl font-bold">Daftar Service</h1>
                        <a href="{{ route('service.create') }}"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Tambah Service</a>
                    </div>
                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">GAMBAR</th>
                                <th class="px-4 py-2">NAMA</th>
                                <th class="px-4 py-2">DESKRIPSI</th>
                                <th class="px-4 py-2">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $service)
                            <tr>
                                <td class="px-4 py-2 self-center align-middle">
                                    <img src="{{ Storage::url('public/services/').$service->image }}"
                                        class="w-24 h-auto rounded" alt="{{ $service->name }}">
                                </td>
                                <td class="px-4 py-2 text-center align-middle">{{ $service->name }}</td>
                                <td class="px-4 py-2 text-center align-middle flex flex-wrap overflow-y-auto max-w-[900px] max-h-[200px]">
                <div class="text-left">{{ $service->description }}</div>
            </td>
                                <td class="px-4 py-2 text-center align-middle">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('service.destroy', $service->id) }}" method="POST">
                                        <a href="{{ route('service.edit', $service->id) }}"
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
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
