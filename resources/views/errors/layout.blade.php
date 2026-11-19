<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Portal UMKM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    <div class="min-h-screen flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            
            <!-- Badge Kode Error -->
            <div class="mx-auto inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-emerald-100 text-emerald-700 font-bold text-sm tracking-wider mb-6">
                ERROR @yield('code')
            </div>

            <!-- Card Utama -->
            <div class="bg-white py-10 px-6 shadow-sm border border-slate-200 rounded-2xl sm:px-10 space-y-5">
                
                <!-- Ikon Peringatan -->
                <div class="mx-auto h-14 w-14 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                </div>

                <!-- Judul & Deskripsi Error -->
                <div class="space-y-2">
                    <h1 class="text-xl sm:text-2xl font-bold text-slate-900">
                        @yield('title')
                    </h1>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        @yield('message')
                    </p>
                </div>

                <!-- Tombol Navigasi -->
                <div class="pt-4 flex flex-col sm:flex-row items-center gap-3">
                    <button onclick="window.history.back()"
                        class="w-full sm:flex-1 inline-flex justify-center rounded-lg bg-slate-100 hover:bg-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-700 transition cursor-pointer">
                        Halaman Sebelumnya
                    </button>
                    <a href="/dashboard"
                        class="w-full sm:flex-1 inline-flex justify-center rounded-lg bg-emerald-600 hover:bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition">
                        Ke Beranda
                    </a>
                </div>
            </div>

            <!-- Footer Kecil -->
            <p class="mt-8 text-xs text-slate-400">
                &copy; 2026 Portal UMKM.
            </p>
        </div>
    </div>

</body>
</html>