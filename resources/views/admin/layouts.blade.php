<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV. Kreasi Mitra Jaya</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .sidebar {
            width: 250px;
            transition: all 0.3s;
            background-color: #273b82;
        }
        .sidebar-collapsed {
            width: 80px;
        }
        .sidebar-item {
            transition: all 0.3s;
        }
        .sidebar-item:hover {
            background-color: #1a2a5b;
        }
    </style>
</head>
<body class="flex h-screen bg-gray-100">
    <div class="sidebar bg-[#273b82] text-white flex flex-col fixed top-0 left-0 h-full">
        <div class="flex items-center justify-center p-4 border-b border-gray-700">
            <img src="/LogoAdmin.png" alt="Company Logo" class="w-10 h-10">
            <span class="ml-3 text-xl font-semibold">CV. Kreasi Mitra Jaya</span>
        </div>
        @if($auth)
        <div class="p-4 border-b border-gray-700">
            <p class="text-center capitalize">Hallo, Admin {{ $auth->name }}!</p>
            <a href="{{ route('actionlogout') }}" class="block mt-4 px-4 py-2 text-center text-white bg-red-500 rounded-md hover:bg-red-600">Logout</a>
        </div>
        @endif
        <nav class="flex-1">
            <ul>
                <li class="sidebar-item p-4 hover:bg-[#1a2a5b]">
                    <a href="/admin" class="flex items-center">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item p-4 hover:bg-[#1a2a5b]">
                    <a href="/admin/product" class="flex items-center">
                        <i class="fas fa-box-open"></i>
                        <span class="ml-3">Product</span>
                    </a>
                </li>
                <li class="sidebar-item p-4 hover:bg-[#1a2a5b]">
                    <a href="/admin/service" class="flex items-center">
                        <i class="fas fa-concierge-bell"></i>
                        <span class="ml-3">Service</span>
                    </a>
                </li>
                <li class="sidebar-item p-4 hover:bg-[#1a2a5b]">
                    <a href="/admin/category" class="flex items-center">
                        <i class="fas fa-th-list"></i>
                        <span class="ml-3">Category</span>
                    </a>
                </li>
                <li class="sidebar-item p-4 hover:bg-[#1a2a5b]">
                    <a href="/admin/productTransaction" class="flex items-center">
                        <i class="fas fa-receipt"></i>
                        <span class="ml-3">Product Transaction</span>
                    </a>
                </li>
                <li class="sidebar-item p-4 hover:bg-[#1a2a5b]">
                    <a href="/admin/serviceTransaction" class="flex items-center">
                        <i class="fas fa-exchange-alt"></i>
                        <span class="ml-3">Service Transaction</span>
                    </a>
                </li>
                <li class="sidebar-item p-4 hover:bg-[#1a2a5b]">
                    <a href="/admin/user" class="flex items-center">
                        <i class="fas fa-user"></i>
                        <span class="ml-3">User</span>
                    </a>
                </li>
                <li class="sidebar-item p-4 hover:bg-[#1a2a5b]">
                    <a href="/admin/about" class="flex items-center">
                        <i class="fas fa-info-circle"></i>
                        <span class="ml-3">About Company</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="flex-1 py-10 pl-[290px] pr-10 bg-white">
        @yield('content')
    </div>

</body>
</html>
