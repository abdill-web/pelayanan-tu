<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan TU Fakultas Teknik</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col font-sans">

    {{-- Sticky Header --}}
    <header class="bg-white text-blue-700 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    {{-- Logo --}}
                    <img src="{{ asset('images/Logo_UMB_Akre.png') }}" alt="Logo Fakultas Teknik" class="h-10 w-10 object-contain">
                    {{-- Judul dan Home --}}
                    <div>
                        <a href="{{ route('home') }}" class="text-xl font-bold hover:underline block">Fakultas Teknik</a>
                    </div>
                </div>
                {{-- Tombol Login Admin --}}
            </div>
        </div>
    </header>

    <main class="flex-grow w-full max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-gray-300 text-sm mt-12">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center">
            &copy; {{ date('Y') }} Fakultas Teknik. All rights reserved.
        </div>
    </footer>

</body>
</html>
