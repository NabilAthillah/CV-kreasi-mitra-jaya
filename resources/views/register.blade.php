<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CV. Kreasi Mitra Jaya</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">
    <main class="flex flex-col gap-10 justify-center items-center h-screen">
        <div class="flex flex-col justify-center items-center gap-4">
            <img src="/Logo.png" alt="" class="w-[100px] h-[100px]">
            <p class="font-roboto font-bold text-2xl cursor-default">CV. Kreasi Mitra Jaya</p>
        </div>
        <form action="{{ route('actionregister') }}" method="POST" class="flex flex-col gap-10">
            @csrf
            <div class="flex flex-col gap-4">
                <div class="flex flex-col">
                    <label for="name" class="font-roboto font-semibold text-lg text-gray-600 px-2">Name</label>
                    <input type="text" name="name" class="px-[6px] py-2 border-2 border-gray-400 rounded-md hover:border-black focus:border-black transition-all duration-300 outline-none text-sm text-gray-600 w-[400px]" placeholder="Masukan nama anda">
                </div>
                <div class="flex flex-col">
                    <label for="email" class="font-roboto font-semibold text-lg text-gray-600 px-2">Email</label>
                    <input type="email" name="email" class="px-[6px] py-2 border-2 border-gray-400 rounded-md hover:border-black focus:border-black transition-all duration-300 outline-none text-sm text-gray-600 w-[400px]" placeholder="Masukan email anda">
                </div>
                <div class="flex flex-col">
                    <label for="password" class="font-roboto font-semibold text-lg text-gray-600 px-2">Password</label>
                    <input type="password" name="password" class="px-[6px] py-2 border-2 border-gray-400 rounded-md hover:border-black focus:border-black transition-all duration-300 outline-none text-sm text-gray-600 w-[400px]" placeholder="Masukan password anda">
                </div>
                <input type="text" name="role" value="user" hidden readonly>
            </div>
            <button class="font-bold font-roboto text-lg bg-[#2738b2] w-full py-1 rounded-full text-white border-2 border-[#273b82] hover:bg-white hover:text-[#273b82] transition-colors duration-200">Register</button>
            <p class="font-roboto cursor-default text-center w-full border-t-2 border-[#273b82] py-8">Belum memiliki akun ? <a href="/register" class="text-[#273b82] cursor-pointer hover:underline">Daftar Disini !</a></p>
</form>
    </main>
</body>
</html>