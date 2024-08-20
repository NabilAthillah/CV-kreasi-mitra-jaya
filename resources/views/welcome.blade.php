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

    <main id="landingPage" class="h-screen w-full">
        <nav id="navbar"
            class="z-50 w-full fixed top-0 left-0 py-4 px-12 flex justify-between items-center transition-colors duration-300">
            <div class="h-fit w-fit bg-white p-3 rounded-full">
                <img src="/Logo.png" alt="" class="w-[35px] h-[35px]">
            </div>
            <div class="flex gap-8">
                <p onclick="scrollToFirstSection()"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">
                    Home</p>
                <p onclick="scrollToGallery()"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">
                    Galeri</p>
                <a href="/product"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">Produk</a>
                <p onclick="scrollToService()"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">
                    Servis</p>
                <a href="/about"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">Tentang
                    Kami</a>
                <p onclick="scrollToContact()"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">
                    Hubungi Kami</p>
            </div>
            <div>
                @if($auth)
                <div class="flex flex-col items-end">
                    <p class="font-roboto font-medium capitalize text-base text-white cursor-default">Hallo,
                        {{$auth->role}} {{$auth->name}} !
                    </p>
                    <div class="flex justify-center gap-5 items-center">
                        @if($auth->role == 'admin')
                        <a href="/admin" class="text-[#c8cc00] font-bold hover:text-[#ccc500]">Dashboard</a>
                        @endif
                        <p id="logoutBtn"
                            class="font-roboto font-medium capitalize text-base text-red-500 cursor-pointer hover:text-red-600">
                            Logout</p>
                        <div id="logoutModal"
                            class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50 transition-all duration-300">
                            <div class="bg-white rounded-lg shadow-lg">
                                <div class="p-6 text-center">
                                    <h2 class="mb-4 text-xl font-semibold">Apakah Anda yakin ingin logout?</h2>
                                    <div class="flex items-center justify-center space-x-4">
                                        <a id="confirmLogout" href="{{ route('actionlogout') }}"
                                            class="px-4 py-2 font-semibold text-white bg-red-500 rounded hover:bg-red-700">Ya</a>
                                        <button id="cancelLogout"
                                            class="px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded hover:bg-gray-400">Tidak</button>
                                    </div>
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

        <div class="flex flex-col gap-6 justify-center h-screen w-full px-32" id="firstSection">
            <div>
                <p
                    class="font-roboto font-black text-3xl text-white border-b-2 border-[#c8cc00] w-fit cursor-default pb-2">
                    CV. Kreasi Mitra Jaya</p>
                <p class="font-roboto font-extrabold text-[42px] uppercase text-white cursor-default">company profile
                </p>
                @forelse($description as $desc)
                <p class="font-roboto font-medium text-base text-white cursor-default max-w-[400px]">
                    {{ $desc->short_company_description }}</p>
                @empty
                <p class="font-roboto font-medium text-base text-white cursor-default max-w-[400px]"></p>
                @endforelse
            </div>
            <a href="/login"
                class="font-roboto font-medium text-lg text-[#273b82] bg-[#c8cc00] px-10 py-2 rounded-md w-fit">Mulai</a>
        </div>

        <div class="h-screen w-full bg-white flex justify-center items-center gap-20 relative">
            <div
                class="shadow-xl max-w-[450px] min-w-[350px] h-[350px] rounded-lg px-10 py-5 flex flex-col justify-start items-center gap-4">
                <p class="font-roboto font-bold text-xl text-[#273b82] cursor-default">VISI</p>
                <div class="h-[2px] bg-[#c8cc00] w-full"></div>
                @forelse($vision as $visi)
                <p class="font-roboto font-light text-base cursor-default">{{ $visi->vision }}</p>
                @empty
                <p class="font-roboto font-light text-base cursor-default text-red-600">Belum ada visi</p>
                @endforelse
            </div>
            <div
                class="shadow-xl max-w-[450px] min-w-[350px] h-[350px] rounded-lg px-10 py-5 flex flex-col justify-start items-center gap-4">
                <p class="font-roboto font-bold text-xl text-[#273b82] cursor-default">MISI</p>
                <div class="h-[2px] bg-[#c8cc00] w-full"></div>
                @forelse($mission as $misi)
                <p class="font-roboto font-light text-base cursor-default">{{ $misi->mission }}</p>
                @empty
                <p class="font-roboto font-light text-base cursor-default text-red-600">Belum ada misi</p>
                @endforelse
            </div>
        </div>

        <div class="h-screen w-full bg-[#273b82] flex justify-center items-center gap-24">
            <img src="/mitra5.jpg" alt="" class="w-[550px] rounded-xl">
            <div class="flex flex-col gap-6 w-[500px]">
                <p
                    class="font-roboto font-extrabold text-3xl text-white border-b-2 border-[#c8cc00] w-fit cursor-default pb-2">
                    CV. Kreasi Mitra Jaya</p>
                @forelse($description as $desc)
                <p class="font-roboto font-medium text-base text-white cursor-default max-w-[400px]">
                    {{ $desc->short_company_description }}</p>
                @empty
                <p class="font-roboto font-medium text-base text-white cursor-default max-w-[400px]"></p>
                @endforelse
                <a href="/about"
                    class="w-fit font-roboto font-medium text-xl text-[#273b82] bg-[#c8cc00] border-2 border-[#c8cc00] rounded-md p-2 hover:bg-[#273b82] hover:text-[#c9cc00] transition-colors duration-150">Selengkapnya</a>
            </div>
        </div>

        <div class="flex flex-col gap-5 pt-10 justify-center items-center">
            <p
                class="font-roboto font-extrabold text-3xl text-[#273b82] border-b-2 border-[#c8cc00] w-fit cursor-default pb-2">
                Kategori Produk</p>
            <div class="grid grid-cols-3 justify-center gap-20">
                @forelse($categories as $category)
                <a href="{{ route('productTransaction.index', ['id' => $category->id]) }}"
                    class="w-[300px] rounded-[12px] shadow-xl">
                    <div
                        class="bg-[url('/public/image3.png')] w-full h-[300px] bg-cover bg-center bg-no-repeat rounded-t-[12px]">
                    </div>
                    <p class="font-roboto font-bold text-lg text-[#273b82] text-center cursor-default py-4 capitalize">
                        {{ $category->name }}</p>
                </a>
            </div>
            @empty
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative flex justify-center w-fit"
                role="alert">
                <strong class="font-bold">Kategori belum Tersedia.</strong>
            </div>
            @endforelse
        </div>

        <div class="flex flex-col gap-5 pt-10 justify-center items-center w-full" id="Service">
            <p
                class="font-roboto font-extrabold text-3xl text-[#273b82] border-b-2 border-[#c8cc00] w-fit cursor-default pb-2">
                Service</p>
            <div class="grid grid-cols-3 justify-center gap-20">
                @forelse($services as $service)
                <a href="/order-service" class="w-[300px] rounded-[12px] shadow-xl">
                    <div
                        class="bg-[url('/public/servis.jpg')] w-full h-[300px] bg-cover bg-center bg-no-repeat rounded-t-[12px]">
                    </div>
                    <p class="font-roboto font-bold text-lg text-[#273b82] text-center cursor-default py-4 capitalize">
                        {{ $service->name }}</p>
                    <p
                        class="font-roboto font-light text-sm text-[#000] text-start cursor-default py-4 px-2 capitalize">
                        {{ $service->description }}</p>
                </a>
            </div>
            @empty
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative flex justify-center w-fit"
                role="alert">
                <strong class="font-bold">Servis belum Tersedia.</strong>
            </div>
            @endforelse
        </div>

        <div class="bg-[#273b82] flex flex-col items-center gap-5 py-10 w-full" id="Gallery">
            <p
                class="font-roboto font-extrabold text-3xl text-white border-b-2 border-[#c8cc00] w-fit cursor-default pb-2">
                Galeri</p>
            <div class="flex justify-center items-start gap-10">
                <div
                    class="bg-[url('/public/galeri1.jpg')] w-[400px] h-[300px] bg-cover bg-center bg-no-repeat rounded-[12px]">
                </div>
                <div
                    class="bg-[url('/public/galeri2.jpg')] w-[400px] h-[300px] bg-cover bg-center bg-no-repeat rounded-[12px]">
                </div>
                <div
                    class="bg-[url('/public/galeri3.jpg')] w-[400px] h-[300px] bg-cover bg-center bg-no-repeat rounded-[12px]">
                </div>
            </div>
        </div>

        <div class="flex justify-center items-center py-[60px] gap-28" id="Contact">
            <div class="flex flex-col gap-3">
                <p
                    class="font-roboto font-extrabold text-3xl text-[#273b82] border-b-2 border-[#c8cc00] w-fit cursor-default pb-2">
                    Hubungi Kami</p>
                @forelse($description as $desc)
                <p class="font-roboto font-medium text-base text-[#273b82] cursor-default max-w-[400px]">
                    {{ $desc->short_company_description }}</p>
                @empty
                <p class="font-roboto font-medium text-base text-white cursor-default max-w-[400px]"></p>
                @endforelse
            </div>
            <div class="flex gap-3 p-5 bg-white shadow-xl rounded-[32px]">
                <div class="bg-[#273b82] flex flex-col py-3 gap-6 w-fit px-2 rounded-2xl shadow-2xl">
                    <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_31_2)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.89063 1.59697C6.43743 1.05099 7.09401 0.627462 7.81687 0.354436C8.53973 0.0814105 9.31237 -0.0348738 10.0836 0.0132893C10.8548 0.0614525 11.6069 0.272963 12.2902 0.633805C12.9735 0.994647 13.5723 1.49658 14.0469 2.10634L19.6563 9.31259C20.6844 10.6345 21.0469 12.3563 20.6406 13.9813L18.9313 20.8251C18.8435 21.1796 18.8486 21.5507 18.946 21.9027C19.0434 22.2547 19.2299 22.5756 19.4875 22.8345L27.1656 30.5126C27.4248 30.7707 27.7463 30.9575 28.0989 31.0549C28.4514 31.1524 28.8232 31.1572 29.1781 31.0688L36.0188 29.3595C36.8208 29.1601 37.6575 29.1451 38.4661 29.3156C39.2748 29.4861 40.0343 29.8377 40.6875 30.3438L47.8938 35.9501C50.4844 37.9657 50.7219 41.7938 48.4031 44.1095L45.1719 47.3407C42.8594 49.6532 39.4031 50.6688 36.1813 49.5345C27.9334 46.6363 20.4454 41.9149 14.275 35.722C8.08242 29.5524 3.36111 22.0656 0.462507 13.8188C-0.668743 10.6001 0.346882 7.14072 2.65938 4.82822L5.89063 1.59697Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_31_2">
                                <rect width="50" height="50" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_14_96)">
                            <path
                                d="M42.5031 7.26892C40.2113 4.95485 37.4816 3.12032 34.4732 1.87234C31.4649 0.624366 28.2381 -0.0120651 24.9813 0.000173203C11.3344 0.000173203 0.2125 11.1189 0.2 24.7689C0.2 29.1408 1.34375 33.3939 3.50313 37.1595L0 50.0002L13.1375 46.5564C16.7703 48.5384 20.843 49.5754 24.9813 49.572H24.9937C38.6437 49.572 49.7625 38.4533 49.775 24.7908C49.7778 21.5347 49.1364 18.3103 47.8879 15.3031C46.6393 12.296 44.8113 9.56548 42.5031 7.26892ZM24.9813 45.3783C21.2912 45.3754 17.6695 44.3825 14.4937 42.5033L13.7437 42.0533L5.95 44.097L8.03125 36.4939L7.54375 35.7095C5.48065 32.4293 4.38952 28.6315 4.39687 24.7564C4.39687 13.4252 13.6375 4.18142 24.9937 4.18142C27.6992 4.17657 30.3788 4.70728 32.8782 5.74296C35.3775 6.77864 37.6472 8.2988 39.5563 10.2158C41.4716 12.1256 42.99 14.3956 44.024 16.8949C45.0581 19.3943 45.5873 22.0735 45.5813 24.7783C45.5688 36.1502 36.3281 45.3783 24.9813 45.3783ZM36.2781 29.9595C35.6625 29.6502 32.6219 28.1533 32.05 27.9408C31.4812 27.7377 31.0656 27.6314 30.6594 28.2502C30.2437 28.8658 29.0562 30.2689 28.7 30.672C28.3438 31.0877 27.975 31.1345 27.3562 30.8283C26.7406 30.5158 24.7437 29.8658 22.3813 27.7502C20.5375 26.1095 19.3031 24.0783 18.9344 23.4627C18.5781 22.8439 18.9 22.5127 19.2094 22.2033C19.4812 21.9283 19.825 21.4783 20.1344 21.122C20.4469 20.7658 20.55 20.5033 20.7531 20.0908C20.9562 19.672 20.8594 19.3158 20.7062 19.0064C20.55 18.697 19.3156 15.6439 18.7938 14.4127C18.2938 13.197 17.7844 13.3658 17.4031 13.3502C17.0469 13.3283 16.6313 13.3283 16.2156 13.3283C15.9018 13.3363 15.593 13.409 15.3085 13.5418C15.0241 13.6746 14.7701 13.8647 14.5625 14.1002C13.9937 14.7189 12.4031 16.2158 12.4031 19.2689C12.4031 22.322 14.6219 25.2564 14.9344 25.672C15.2406 26.0877 19.2906 32.3345 25.5062 35.022C26.975 35.6627 28.1313 36.0408 29.0344 36.3283C30.5188 36.8033 31.8594 36.7314 32.9281 36.5783C34.1156 36.397 36.5875 35.0783 37.1094 33.6314C37.6219 32.1814 37.6219 30.9439 37.4656 30.6845C37.3125 30.422 36.8969 30.2689 36.2781 29.9595Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_14_96">
                                <rect width="50" height="50" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_14_98)">
                            <path
                                d="M25 0C18.2156 0 17.3625 0.03125 14.6969 0.15C12.0312 0.275 10.2156 0.69375 8.625 1.3125C6.95576 1.93852 5.44419 2.92312 4.19688 4.19688C2.92312 5.44419 1.93852 6.95576 1.3125 8.625C0.69375 10.2125 0.271875 12.0312 0.15 14.6875C0.03125 17.3594 0 18.2094 0 25.0031C0 31.7906 0.03125 32.6406 0.15 35.3063C0.275 37.9688 0.69375 39.7844 1.3125 41.375C1.95312 43.0187 2.80625 44.4125 4.19688 45.8031C5.58438 47.1937 6.97813 48.05 8.62187 48.6875C10.2156 49.3063 12.0281 49.7281 14.6906 49.85C17.3594 49.9688 18.2094 50 25 50C31.7906 50 32.6375 49.9688 35.3063 49.85C37.9656 49.725 39.7875 49.3063 41.3781 48.6875C43.0462 48.0611 44.5567 47.0765 45.8031 45.8031C47.1937 44.4125 48.0469 43.0187 48.6875 41.375C49.3031 39.7844 49.725 37.9688 49.85 35.3063C49.9688 32.6406 50 31.7906 50 25C50 18.2094 49.9688 17.3594 49.85 14.6906C49.725 12.0313 49.3031 10.2125 48.6875 8.625C48.0615 6.95576 47.0769 5.44419 45.8031 4.19688C44.5558 2.92312 43.0442 1.93852 41.375 1.3125C39.7812 0.69375 37.9625 0.271875 35.3031 0.15C32.6344 0.03125 31.7875 0 24.9937 0H25ZM22.7594 4.50625H25.0031C31.6781 4.50625 32.4688 4.52813 35.1031 4.65C37.5406 4.75938 38.8656 5.16875 39.7469 5.50938C40.9125 5.9625 41.7469 6.50625 42.6219 7.38125C43.4969 8.25625 44.0375 9.0875 44.4906 10.2563C44.8344 11.1344 45.2406 12.4594 45.35 14.8969C45.4719 17.5312 45.4969 18.3219 45.4969 24.9937C45.4969 31.6656 45.4719 32.4594 45.35 35.0938C45.2406 37.5312 44.8313 38.8531 44.4906 39.7344C44.087 40.8184 43.4476 41.7993 42.6187 42.6063C41.7437 43.4813 40.9125 44.0219 39.7438 44.475C38.8688 44.8188 37.5438 45.225 35.1031 45.3375C32.4688 45.4563 31.6781 45.4844 25.0031 45.4844C18.3281 45.4844 17.5344 45.4563 14.9 45.3375C12.4625 45.225 11.1406 44.8188 10.2594 44.475C9.17448 44.0727 8.19249 43.4344 7.38437 42.6063C6.55398 41.7988 5.91353 40.8167 5.50938 39.7313C5.16875 38.8531 4.75938 37.5281 4.65 35.0906C4.53125 32.4562 4.50625 31.6656 4.50625 24.9875C4.50625 18.3094 4.53125 17.525 4.65 14.8906C4.7625 12.4531 5.16875 11.1281 5.5125 10.2469C5.96563 9.08125 6.50937 8.24687 7.38437 7.37187C8.25937 6.49687 9.09062 5.95625 10.2594 5.50313C11.1406 5.15938 12.4625 4.75313 14.9 4.64062C17.2063 4.53438 18.1 4.50313 22.7594 4.5V4.50625ZM38.3469 8.65625C37.9529 8.65625 37.5628 8.73385 37.1988 8.88461C36.8348 9.03538 36.5041 9.25635 36.2256 9.53493C35.947 9.81351 35.726 10.1442 35.5752 10.5082C35.4245 10.8722 35.3469 11.2623 35.3469 11.6562C35.3469 12.0502 35.4245 12.4403 35.5752 12.8043C35.726 13.1683 35.947 13.499 36.2256 13.7776C36.5041 14.0561 36.8348 14.2771 37.1988 14.4279C37.5628 14.5787 37.9529 14.6562 38.3469 14.6562C39.1425 14.6562 39.9056 14.3402 40.4682 13.7776C41.0308 13.215 41.3469 12.4519 41.3469 11.6562C41.3469 10.8606 41.0308 10.0975 40.4682 9.53493C39.9056 8.97232 39.1425 8.65625 38.3469 8.65625ZM25.0031 12.1625C23.3002 12.1359 21.609 12.4484 20.0281 13.0817C18.4471 13.715 17.0079 14.6565 15.7942 15.8513C14.5806 17.0462 13.6168 18.4705 12.9589 20.0414C12.301 21.6124 11.9622 23.2985 11.9622 25.0016C11.9622 26.7047 12.301 28.3908 12.9589 29.9617C13.6168 31.5326 14.5806 32.957 15.7942 34.1518C17.0079 35.3467 18.4471 36.2881 20.0281 36.9214C21.609 37.5547 23.3002 37.8672 25.0031 37.8406C28.3736 37.788 31.5882 36.4122 33.9531 34.0102C36.3179 31.6081 37.6434 28.3724 37.6434 25.0016C37.6434 21.6307 36.3179 18.395 33.9531 15.993C31.5882 13.5909 28.3736 12.2151 25.0031 12.1625ZM25.0031 16.6656C26.0976 16.6656 27.1814 16.8812 28.1926 17.3C29.2037 17.7189 30.1225 18.3328 30.8964 19.1067C31.6703 19.8806 32.2842 20.7994 32.7031 21.8106C33.1219 22.8217 33.3375 23.9055 33.3375 25C33.3375 26.0945 33.1219 27.1783 32.7031 28.1894C32.2842 29.2006 31.6703 30.1194 30.8964 30.8933C30.1225 31.6672 29.2037 32.2811 28.1926 32.7C27.1814 33.1188 26.0976 33.3344 25.0031 33.3344C22.7927 33.3344 20.6728 32.4563 19.1098 30.8933C17.5468 29.3303 16.6688 27.2104 16.6688 25C16.6688 22.7896 17.5468 20.6697 19.1098 19.1067C20.6728 17.5437 22.7927 16.6656 25.0031 16.6656Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_14_98">
                                <rect width="50" height="50" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.15625 11.1094C0.471307 9.72888 1.2458 8.49629 2.35288 7.61346C3.45996 6.73064 4.83401 6.2499 6.25 6.25H43.75C45.166 6.2499 46.54 6.73064 47.6471 7.61346C48.7542 8.49629 49.5287 9.72888 49.8438 11.1094L25 26.2937L0.15625 11.1094ZM0 14.6781V36.8781L18.1344 25.7594L0 14.6781ZM21.1281 27.5938L0.596875 40.1781C1.10415 41.2478 1.90477 42.1513 2.90557 42.7837C3.90636 43.416 5.06617 43.7511 6.25 43.75H43.75C44.9336 43.7503 46.093 43.4144 47.0932 42.7815C48.0935 42.1486 48.8934 41.2447 49.4 40.175L28.8687 27.5906L25 29.9563L21.1281 27.5938ZM31.8656 25.7625L50 36.8781V14.6781L31.8656 25.7625Z"
                            fill="white" />
                    </svg>
                </div>
                <div class="flex flex-col py-3 px-2 gap-6">
                    <p class="font-robot font-bold text-lg text-[#273b82] py-[6px] cursor-default">031 8921657</p>
                    <p class="font-robot font-bold text-lg text-[#273b82] py-[6px] cursor-default">082337372347</p>
                    <p class="font-robot font-bold text-lg text-[#273b82] py-[6px] cursor-default">mitrajayacollection
                    </p>
                    <p class="font-robot font-bold text-lg text-[#273b82] py-[6px] cursor-default">
                        mitrajayacollection@gmail.com</p>
                </div>
            </div>
        </div>

        <footer class="bg-[#273b82] flex flex-col gap-20 w-full">
            <div class="flex gap-5 px-10 py-5">
                <a href="/about"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">Tentang
                    Kami</a>
                <a href="/product"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">
                    Produk</a>
                <p onclick="scrollToGallery()"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">
                    Galeri</p>
                <p onclick="scrollToContact()"
                    class="font-roboto font-semibold text-base text-white cursor-pointer hover:underline hover:decoration-white">
                    Hubungi Kami</p>
            </div>
            <div class="py-5 flex justify-center items-center">
                <p class="font-roboto font-extrabold text-base text-white cursor-default">@2024 CV. Kreasi Mitra Jaya
                    ALL Rights Reserved</p>
            </div>
        </footer>
    </main>

    <script>
        var modal = document.getElementById("logoutModal");
        var btn = document.getElementById("logoutBtn");
        var cancelBtn = document.getElementById("cancelLogout");
        var confirmBtn = document.getElementById("confirmLogout");

        window.addEventListener('scroll', function () {
            var navbar = document.getElementById('navbar');
            if (window.scrollY > 600) {
                navbar.classList.add('bg-[#273b82]');
            } else {
                navbar.classList.remove('bg-[#273b82]');
            }
        });

        function scrollToFirstSection() {
            const section = document.getElementById('firstSection');
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            } else {
                console.error('Section with id "firstSection" not found.');
            }
        }

        function scrollToGallery() {
            const section = document.getElementById('Gallery');
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            } else {
                console.error('Section with id "Gallery" not found.');
            }
        }

        function scrollToService() {
            const section = document.getElementById('Service');
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            } else {
                console.error('Section with id "Service" not found.');
            }
        }

        function scrollToContact() {
            const section = document.getElementById('Contact');
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            } else {
                console.error('Section with id "Contact" not found.');
            }
        }

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
