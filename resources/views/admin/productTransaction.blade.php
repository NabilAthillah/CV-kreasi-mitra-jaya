@extends('admin.layouts')

@section('content')
<div class="container mt-5">
    <div class="flex justify-between items-center mb-5">
        <h1 class="text-2xl font-bold">Daftar Transaksi Produk</h1>
    </div>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">BUKTI PEMBAYARAN</th>
                    <th class="px-4 py-2">NAMA PEMBELI</th>
                    <th class="px-4 py-2">NOMOR TELFON</th>
                    <th class="px-4 py-2">ALAMAT</th>
                    <th class="px-4 py-2">NAMA PRODUK</th>
                    <th class="px-4 py-2">JUMLAH</th>
                    <th class="px-4 py-2">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productTransactions as $data)
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2">
                        <img src="{{ Storage::url('public/product_transactions/').$data->proof_of_payment }}" class="w-24 h-auto rounded"
                            alt="{{ $data->name }}">
                    </td>
                    <td class="px-4 py-2 text-center align-middle">{{ $data->user->name }}</td>
                    <td class="px-4 py-2 text-center align-middle">{!! $data->product->name !!}</td>
                    <td class="px-4 py-2 text-center align-middle">{{ $data->phone_number }}</td>
                    <td class="px-4 py-2 text-center align-middle">{{ $data->address }}</td>
                    <td class="px-4 py-2 text-center align-middle">{{ $data->qty }}</td>
                    <td class="px-4 py-2 text-center align-middle">{{ $data->totalPrice }}</td>
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
