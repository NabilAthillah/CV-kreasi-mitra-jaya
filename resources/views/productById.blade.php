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

        <div class="bg-white">
            <div class="mx-auto px-4 py-[100px] flex flex-col items-center">
                @foreach($categories as $category)
                <p class="font-black text-2xl font-roboto text-[#273b82] cursor-default py-10">Product
                    {{$category->name}}</p>
                @endforeach

                <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    @foreach($products as $product)
                    <a href="{{ route('productTransaction.create', ['id' => $product->id]) }}" class="group">
                        <div
                            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="{{ Storage::url('public/products/').$product->image }}"
                                alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <div class="p-2">
                            <h3 class="mt-4 text-sm text-gray-700">{{$product->name}}</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">Rp. {{$product->price}}</p>
                            <p class="mt-1 text-xs font-extralight text-gray-900">{{$product->description}}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <script>
            var modal = document.getElementById("logoutModal");
            var btn = document.getElementById("logoutBtn");
            var cancelBtn = document.getElementById("cancelLogout");
            var confirmBtn = document.getElementById("confirmLogout");

            btn.onclick = function () {
                modal.classList.remove("hidden");
            }

            cancelBtn.onclick = function () {
                modal.classList.add("hidden");
            }

            confirmBtn.onclick = function () {
                alert("Logged out!");
                modal.classList.add("hidden");
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.classList.add("hidden");
                }
            }

        </script>
</body>

</html>
