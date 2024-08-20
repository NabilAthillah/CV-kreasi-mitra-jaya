@extends('admin.layouts')

@section('content')
<div class="container mt-5">
    <div class="flex justify-between items-center mb-5">
        <h1 class="text-2xl font-bold">Daftar Transaksi Servis</h1>
    </div>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">NAMA PEMBELI</th>
                    <th class="px-4 py-2">NAMA SERVIS</th>
                    <th class="px-4 py-2">NOMOR TELFON</th>
                    <th class="px-4 py-2">ALAMAT</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($serviceTransactions as $data)
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2 text-center align-middle">{{ $data->user->name }}</td>
                    <td class="px-4 py-2 text-center align-middle">{!! $data->service->name !!}</td>
                    <td class="px-4 py-2 text-center align-middle">{{ $data->phone_number }}</td>
                    <td class="px-4 py-2 text-center align-middle">{{ $data->address }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 text-center">Data Transaksi Layanan belum Tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



@stop
