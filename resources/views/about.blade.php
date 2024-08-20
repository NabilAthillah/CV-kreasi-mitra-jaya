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

        <div class="w-full py-[70px] px-[200px] flex flex-col items-center">
            <p class="font-black text-2xl font-roboto text-[#273b82] cursor-default py-10">Tentang Kami</p>
            <div class="flex justify-center items-start gap-10">
                <img src="/mitra5.jpg" alt="" class="h-1/2 rounded-md shadow sm">
                <div class="w-full">
                    @foreach($abouts as $about)
                    <p class="font-roboto text-base font-light">
                        {{ $about->long_company_description }}<br />
                    </p>
                    @endforeach
                </div>
            </div>
            <div class="flex flex-col items-center py-10">
                <p class="font-bold text-xl font-roboto text-[#273b82] cursor-default">Visi Kami</p>
                @foreach($abouts as $about)
                <p class="font-roboto text-base font-light">{{ $about->vision }}</p>
                @endforeach
            </div>
            <div class="flex flex-col items-center py-10">
                <p class="font-bold text-xl font-roboto text-[#273b82] cursor-default">Misi Kami</p>
                @foreach($mission as $about)
                <p class="font-roboto text-base font-light">{{ $about->mission }}</p>
                @endforeach
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

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.classList.add("hidden");
                }
            }

        </script>
</body>

</html>
