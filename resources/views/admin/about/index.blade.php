@extends('admin.layouts')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <div class="flex justify-between items-center mb-5">
                        <h1 class="text-2xl font-bold">Tentang Perusahaan</h1>
                        <a href="{{ route('about.create') }}"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Tambah Tentang Perusahaan</a>
                    </div>
                    <table class="table-auto w-full border-collapse">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2">VISI</th>
            <th class="px-4 py-2">MISI</th>
            <th class="px-4 py-2">DESKRIPSI SINGKAT</th>
            <th class="px-4 py-2">DESKRIPSI PANJANG</th>
            <th class="px-4 py-2">AKSI</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($abouts as $about)
        <tr>
            <td class="px-4 py-2 text-center align-middle">{{ $about->vision }}</td>
            <td class="px-4 py-2 text-center align-middle">{{ $about->mission }}</td>
            <td class="px-4 py-2 text-center align-middle">{{ $about->short_company_description }}</td>
            <td class="px-4 py-2 text-center align-middle flex flex-wrap overflow-y-auto max-w-[900px] max-h-[200px]">
                <div class="text-left">{{ $about->long_company_description }}</div>
            </td>
            <td class="px-4 py-2 text-center align-middle">
                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                    action="{{ route('about.destroy', $about->id) }}" method="POST">
                    <a href="{{ route('about.edit', $about->id) }}"
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
            <td colspan="5" class="px-4 py-2 text-center">Data About belum Tersedia.</td>
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
