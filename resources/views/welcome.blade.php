<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasa Pembuatan Website Builder - Portal UMKM</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='%239CAF88'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z' /%3E%3C/svg%3E">

    <!-- CDN / Vite Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    <div class="min-h-screen flex flex-col">
        
        <!-- TOPBAR / NAVBAR ATAS -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-8 sticky top-0 z-50 shadow-xs">
            <div class="flex items-center gap-3">
                <div class="h-9 w-9 bg-emerald-600 text-white rounded-lg flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.25m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.25m0 0A9.04 9.04 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-base sm:text-lg font-semibold text-slate-800">Portal UMKM</h1>
                </div>
            </div>

            @guest
            <div class="flex items-center gap-3">
                <a href="/login" class="px-4 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-medium transition shadow-sm">
                    Login Admin
                </a>
            </div>
            @endguest
            
            @auth
            <div class="flex items-center gap-3">
                <a href="/dashboard" class="px-4 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition">
                    Kembali ke Beranda
                </a>
            </div>
            @endauth
        </header>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-4 sm:p-8 space-y-6 max-w-5xl mx-auto w-full flex flex-col justify-center">
            
            <!-- HERO SECTION PROMOSI -->
            <div class="bg-gradient-to-br from-emerald-600 to-teal-700 rounded-2xl text-white p-8 sm:p-12 shadow-sm flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="space-y-4 max-w-xl">
                    <span class="bg-emerald-500/40 text-emerald-100 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">Solusi Digital UMKM</span>
                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight">Kembangkan Bisnis UMKM Anda dengan Website Profesional Sendiri</h2>
                    <p class="text-emerald-50 text-sm sm:text-base leading-relaxed">
                        Bangun portofolio produk, kelola katalog digital, dan jangkau jutaan pelanggan lebih cepat menggunakan platform Portal UMKM terintegrasi.
                    </p>
                    <div class="pt-2 flex gap-3">
                        <a href="#kontak" class="px-5 py-2.5 bg-white text-emerald-700 hover:bg-emerald-50 rounded-xl font-semibold text-sm shadow-sm transition inline-block">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-xs flex items-center gap-4">
                    <div class="h-10 w-10 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center shrink-0 font-bold">✓</div>
                    <div>
                        <h4 class="font-semibold text-sm text-slate-800">Manajemen Katalog Produk</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Kelola produk dan harga dengan mudah dan cepat.</p>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-xs flex items-center gap-4">
                    <div class="h-10 w-10 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center shrink-0 font-bold">✓</div>
                    <div>
                        <h4 class="font-semibold text-sm text-slate-800">Akses Admin Aman</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Dilengkapi sistem login terproteksi berbasis role.</p>
                    </div>
                </div>
            </div>

            <!-- CTA / KONTAK SECTION -->
            <div id="kontak" class="bg-white rounded-xl border border-slate-200 shadow-xs p-8 text-center space-y-4">
                <h3 class="text-lg font-bold text-slate-800">Siap Mengubah Bisnis UMKM Anda Menjadi Digital?</h3>
                <p class="text-xs text-slate-500 max-w-md mx-auto">Konsultasikan kebutuhan pembuatan website portofolio usaha Anda bersama tim kami sekarang.</p>
                <div class="pt-2">
                    <a href="https://wa.me/6289627944050" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-medium transition shadow-sm cursor-pointer">
                        Chat via WhatsApp
                    </a>
                </div>
            </div>

        </main>

        <!-- FOOTER -->
        <footer class="bg-white border-t border-slate-200 py-6 text-center text-xs text-slate-400 mt-12">
            &copy; 2026 Portal UMKM. All rights reserved.
        </footer>

    </div>
</body>
</html>