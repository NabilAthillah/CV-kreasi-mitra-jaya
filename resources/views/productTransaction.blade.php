<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CV. Kreasi Mitra Jaya</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white min-h-screen">

    <main class="h-screen w-full">
        <nav id="navbar"
            class="z-50 w-full fixed top-0 left-0 py-4 px-12 flex justify-between items-center transition-colors duration-300 bg-[#273b82]">
            <div class="h-fit w-fit bg-white p-3 rounded-full">
                <img src="/Logo.png" alt="" class="w-[35px] h-[35px]">
            </div>
            <div class="flex gap-8">
                <a href="/"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">
                    Home</a>
                <a href="/#Gallery"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">
                    Galeri</a>
                <a href="/product"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">Produk</a>
                <a href="/#Service"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">Servis</a>
                <a href="/about"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">Tentang
                    Kami</a>
                <a href="/#Contact"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">
                    Hubungi Kami</a>
            </div>
            <div>
                @if($auth)
                <div class="flex flex-col items-end">
                    <p class="font-roboto font-medium capitalize text-base text-white cursor-default">Hallo,
                        {{$auth->role}} {{$auth->name}} !
                    </p>
                    <p id="logoutBtn"
                        class="font-roboto font-medium capitalize text-base text-red-500 cursor-pointer hover:text-red-600">
                        Logout</p>
                    <div id="logoutModal"
                        class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50 transition-all duration-300">
                        <div class="bg-white rounded-lg shadow-lg">
                            <div class="p-6 text-center">
                                <h2 class="mb-4 text-xl font-semibold">Apakah Anda yakin ingin logout?</h2>
                                <div class="flex items-center justify-center space-x-4">
                                    <a href="/actionlogout" id="confirmLogout"
                                        class="px-4 py-2 font-semibold text-white bg-red-500 rounded hover:bg-red-700">Ya</a>
                                    <button id="cancelLogout"
                                        class="px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded hover:bg-gray-400">Tidak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <a href="/login"
                    class="font-roboto font-semibold text-base text-[#273b82] px-12 py-1 bg-white rounded-full hover:bg-[#273b82] hover:text-white transition-colors">Masuk</a>
                @endif
            </div>
        </nav>

        <form action="{{route('productTransaction.store')}}" method="post" id="productTransactionForm"
            class="py-[70px] flex flex-col justify-start items-center h-full gap-5">
            @csrf
            <p class="font-black text-2xl font-roboto text-[#273b82] cursor-default py-10">Form Transaksi Product</p>
            <div class="max-w-[900px] w-full flex gap-10 bg-white" id="serviceFirst">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col">
                        <label for="phone_number" class="font-roboto font-semibold text-lg text-gray-600 px-2">Nomor
                            Handphone</label>
                        <input type="text" name="phone_number"
                            class="px-[6px] py-2 border-2 border-gray-400 rounded-md hover:border-black focus:border-black transition-all duration-300 outline-none text-sm text-gray-600 w-[400px]"
                            placeholder="Masukan nomor telfon anda"
                            required>
                    </div>
                    <div class="flex flex-col">
                        <label for="address" class="font-roboto font-semibold text-lg text-gray-600 px-2">Alamat</label>
                        <input type="text" name="address"
                            class="px-[6px] py-2 border-2 border-gray-400 rounded-md hover:border-black focus:border-black transition-all duration-300 outline-none text-sm text-gray-600 w-[400px]"
                            placeholder="Masukan alamat anda"
                            required>
                    </div>
                    <div class="flex flex-col">
                        <label for="product" class="font-roboto font-semibold text-lg text-gray-600 px-2">Nama
                            Produk</label>
                        <select name="product" id="product"
                            class="px-[6px] py-2 border-2 border-gray-400 rounded-md hover:border-black focus:border-black transition-all duration-300 outline-none text-sm text-gray-600 w-[400px] cursor-pointer">
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="product" class="font-roboto font-semibold text-lg text-gray-600 px-2">Harga
                            Produk</label>
                        @foreach($products as $product)
                        <input type="text" value="{{ $product->price }}" id="price"
                            class="px-[6px] py-2 border-2 border-gray-400 rounded-md hover:border-black focus:border-black transition-all duration-300 outline-none text-sm text-gray-600 w-[400px] placeholder:font-medium placeholder:text-black capitalize cursor-not-allowed"
                            placeholder="{{ $product->price }}" readonly>
                        @endforeach
                    </div>
                    <div class="flex flex-col">
                        <label for="qty" class="font-roboto font-semibold text-lg text-gray-600 px-2">Jumlah</label>
                        <input type="number" name="qty" id="qty"
                            class="px-[6px] py-2 border-2 border-gray-400 rounded-md hover:border-black focus:border-black transition-all duration-300 outline-none text-sm text-gray-600 w-[400px]"
                            placeholder="Masukan jumlah barang yang ingin anda pesan"
                            required>
                    </div>
                </div>
                <div class="h-full w-[2px] bg-[#273b82]"></div>
                <div class="flex flex-col gap-5 items-center">
                    <p class="font-roboto font-medium text-red-600 text-xs text-center">Silahkan melakukan pembayaran ke
                        rekening dibawah ini. Pastikan data yang anda isi sudah benar</p>
                    <div class="flex flex-col items-center">
                        <img src="/Qris.png" alt="" class="w-[180px]">
                        <p class="font-roboto font-bold text-black text-[14px] text-center">No. Rekening ABC 0123456789
                            a/n Mitra Jaya Collection</p>
                    </div>
                    <div class="flex flex-col">
                        <label for="totalPrice" class="font-roboto font-semibold text-lg text-gray-600 px-2">Total harga
                            yang harus dibayar</label>
                        <input type="text" name="totalPrice" id="totalPrice"
                            class="px-[6px] py-2 border-2 border-gray-400 rounded-md hover:border-black focus:border-black transition-all duration-300 outline-none text-sm text-gray-600 w-[400px] placeholder:font-medium  capitalize cursor-not-allowed"
                            placeholder="Harga total akan muncul disini" readonly>
                    </div>
                    <div class="flex flex-col">
                        <label for="proof_of_payment" class="font-roboto font-semibold text-lg text-gray-600 px-2">Bukti
                            pembayaran</label>
                        <input type="file"
                            class="px-[6px] py-2 border-2 border-gray-400 rounded-md hover:border-black focus:border-black transition-all duration-300 outline-none text-sm text-gray-600 w-[400px] placeholder:font-medium"
                            name="proof_of_payment"
                            required
                            accept="image/*">
                    </div>
                </div>
            </div>
            <button type="submit"
                class="font-bold font-roboto text-lg bg-[#2738b2] w-full max-w-[400px] py-1 rounded-full text-white border-2 border-[#273b82] hover:bg-white hover:text-[#273b82] transition-colors duration-200 text-center cursor-pointer">
                Pesan</button>
        </form>

        <script>
            const priceInput = document.getElementById('price');
            const qtyInput = document.getElementById('qty');
            const totalPriceInput = document.getElementById('totalPrice');

            qtyInput.addEventListener('input', updateTotalPrice);

            function updateTotalPrice() {
                const price = priceInput.value;
                const qty = qtyInput.value;

                const totalPrice = price * qty;
                const formattedTotalPrice = formatRupiah(totalPrice);
                totalPriceInput.value = formattedTotalPrice;
            }

            function formatRupiah(angka) {
                var reverse = angka.toString().split('').reverse().join('');
                var ribuan = reverse.match(/\d{1,3}/g);
                var formatted = (ribuan ? ribuan.join('.') : '').split('').reverse().join('');
                return formatted;
            }

            updateTotalPrice();

            document.getElementById('productTransactionForm').addEventListener('submit', function (event) {
                event.preventDefault();

                let formData = new FormData(this);

                fetch('/order-product', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = '/';
                        } else {
                            let errorMessages = document.getElementById('errorMessages');
                            errorMessages.innerHTML = '';
                            if (data.errors) {
                                for (const [key, messages] of Object.entries(data.errors)) {
                                    messages.forEach(message => {
                                        let errorItem = document.createElement('p');
                                        errorItem.textContent = message;
                                        errorMessages.appendChild(errorItem);
                                    });
                                }
                            } else {
                                alert(data.message);
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });

        </script>
</body>

</html>
