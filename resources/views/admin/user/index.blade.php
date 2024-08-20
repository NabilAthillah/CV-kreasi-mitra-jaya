@extends('admin.layouts')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <div class="flex justify-between items-center mb-5">
                        <h1 class="text-2xl font-bold">Daftar Pengguna</h1>
                    </div>
                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">NAMA</th>
                                <th class="px-4 py-2">EMAIL</th>
                                <th class="px-4 py-2">ROLE</th>
                                <th class="px-4 py-2">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td class="px-4 py-2 text-center align-middle">{{ $user->name }}</td>
                                <td class="px-4 py-2 text-center align-middle">{{ $user->email }}</td>
                                <td class="px-4 py-2 text-center align-middle">{{ $user->role }}</td>
                                <td class="px-4 py-2 text-center align-middle">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('user.destroy', $user->id) }}" method="POST">
                                        <a href="{{ route('user.edit', $user->id) }}"
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
                </div>
            </div>
        </div>
    </div>
</div>
@stop
