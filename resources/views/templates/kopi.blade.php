<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $Portofolio->nama_umkm }}</title>
     @if(!empty($Portofolio->foto_umkm))
        <link rel="icon" href="{{ asset('storage/' . $Portofolio->foto_umkm) }}">
    @else
        <!-- Ikon cadangan jika foto UMKM kosong -->
        <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://w3.org' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='%236B8E6E'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z' /%3E%3C/svg%3E">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-50 text-stone-800 font-sans antialiased">

    <!-- Navbar -->
    <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-stone-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-amber-800 tracking-tight">
                {{ $Portofolio->nama_umkm }}
            </a>
            <div class="hidden md:flex space-x-6 text-sm font-medium text-stone-600">
                <a href="#tentang" class="hover:text-amber-700 transition">Tentang Kami</a>
                <a href="#produk" class="hover:text-amber-700 transition">Produk Unggulan</a>
                <a href="#lokasi" class="hover:text-amber-700 transition">Lokasi & Kontak</a>
            </div>
            <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $Portofolio->nomer_telepon)) }}" target="_blank" 
               class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition shadow-sm">
                Chat WhatsApp
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-gradient-to-br from-amber-900 via-amber-800 to-stone-900 text-white py-16 md:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 grid md:grid-cols-2 gap-10 items-center">
            <div class="space-y-5">
                <!-- Dummy: nama_umkm -->
                <h1 class="text-3xl sm:text-5xl font-extrabold leading-tight">
                    {{ $Portofolio->nama_umkm }}
                </h1>
                <!-- Dummy: bio -->
                <p class="text-stone-200 text-base sm:text-lg leading-relaxed">
                   {{ $Portofolio->bio }}
                </p>
                <div class="pt-2 flex flex-wrap gap-3">
                    <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $Portofolio->nomer_telepon)) }}?text={{ rawurlencode('Halo ' . $Portofolio->nama_umkm) }}" 
                       target="_blank"
                       class="bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-6 py-3 rounded-xl transition shadow-lg">
                        Pesan via WhatsApp
                    </a>
                    <a href="#produk" 
                       class="bg-white/10 hover:bg-white/20 text-white font-medium px-6 py-3 rounded-xl transition">
                        Lihat Produk
                    </a>
                </div>
            </div>
            <div class="relative">
                <img src="{{ asset('storage/' . $Portofolio->foto_umkm) }}"  
                     alt="Foto UMKM" 
                     class="rounded-2xl shadow-2xl object-cover w-full h-72 md:h-96 border-4 border-white/10">
            </div>
        </div>
    </header>

    <!-- Tentang / Bio Section -->

    <!-- Produk / Layanan Unggulan -->
    <section id="produk" class="py-12 max-w-5xl mx-auto px-4 sm:px-6">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-stone-900">Produk Unggulan</h2>
            <p class="text-stone-500 text-sm mt-1">Pilihan favorit pelanggan kami</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($produk as $prod)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-stone-200 flex flex-col">
                <img src="{{ asset('storage/' . $prod->foto_produk) }}" 
                     alt="Arabika 250g" class="h-48 w-full object-cover">
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-lg text-stone-900">{{ $prod->nama_produk }}</h3>
                        <p class="text-stone-500 text-sm mt-1">{{ $prod->deskripsi_produk }}</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-stone-100 flex items-center justify-between">
                        <span class="font-bold text-amber-800">Rp {{ $prod->harga_produk }}</span>
                        <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $Portofolio->nomer_telepon)) }}?text={{ rawurlencode('Halo Saya Ingin memesan ' . $prod->nama_produk) }}" target="_blank" class="text-sm font-semibold text-emerald-600 hover:underline">
                            Pesan &rarr;
                        </a>
                    </div>
                </div>
            </div>
            
            @endforeach
            <!-- Card 1 -->
        </div>
    </section>

    <!-- Lokasi & Kontak Section -->
    <section id="lokasi" class="py-16 max-w-5xl mx-auto px-4 sm:px-6">
        <div class="bg-white rounded-2xl p-8 shadow-sm border border-stone-200 grid md:grid-cols-2 gap-8 items-center">
            <div class="space-y-4">
                <h2 class="text-2xl font-bold text-stone-900">Kunjungi & Hubungi Kami</h2>
                <p class="text-stone-600 text-sm">
                    Silakan datang langsung ke tempat usaha kami atau hubungi nomor di bawah ini untuk pemesanan dan kerja sama.
                </p>

                <div class="space-y-3 pt-2">
                    <!-- Dummy: alamat -->
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-stone-400">Alamat Lengkap</span>
                        <p class="text-stone-800 font-medium mt-0.5">
                           {{ $Portofolio->alamat }}
                        </p>
                    </div>

                    <!-- Dummy: nomer_telepon -->
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-stone-400">Nomor Telepon / WhatsApp</span>
                        <p class="text-stone-800 font-medium mt-0.5">
                           {{ rtrim(chunk_split($Portofolio->nomer_telepon, 4, '-'), '-') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 pb-16">
        <div class="bg-emerald-700 rounded-2xl p-8 md:p-12 text-center text-white">
            <span class="text-emerald-200 text-sm font-semibold uppercase tracking-wider">
                Dukung Produk Lokal
            </span>
            <h2 class="text-2xl md:text-3xl font-bold mt-3">
                Nikmati Kopi Lokal Berkualitas!
            </h2>
            <p class="text-emerald-100 mt-3 max-w-xl mx-auto">
                Setiap pembelian Anda membantu mendukung petani kopi lokal
                dan perkembangan UMKM Indonesia.
            </p>
            <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $Portofolio->nomer_telepon)) }}?text={{ rawurlencode('Halo ' . $Portofolio->nama_umkm) }}"
               target="_blank"
               class="inline-block mt-6 bg-white text-emerald-700 hover:bg-emerald-50 font-bold px-7 py-3 rounded-xl transition">
                Hubungi Kami Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-stone-900 text-stone-300">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-10">
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-xl font-bold text-white">
                        {{ $Portofolio->nama_umkm }}
                    </h3>
                    <p class="text-sm text-stone-400 mt-3 leading-relaxed max-w-md">
                        {{ $Portofolio->bio }}
                    </p>
                </div>

                <div class="md:text-right">
                    <h3 class="font-semibold text-white mb-3">
                        Navigasi
                    </h3>
                    <div class="flex flex-wrap md:justify-end gap-4 text-sm">
                        <a href="#tentang" class="hover:text-amber-400 transition">
                            Tentang Kami
                        </a>
                        <a href="#produk" class="hover:text-amber-400 transition">
                            Produk
                        </a>
                        <a href="#lokasi" class="hover:text-amber-400 transition">
                            Kontak
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-stone-700 mt-8 pt-6 flex flex-col sm:flex-row justify-between items-center gap-3">
                <p class="text-xs text-stone-500">
                    &copy; <span id="tahun"></span> {{ $Portofolio->nama_umkm }}
                    Hak Cipta Dilindungi.
                </p>
                <p class="text-xs text-stone-500">
                    Bagian dari Portal UMKM Indonesia
                </p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $Portofolio->nomer_telepon)) }}?text={{ rawurlencode('Halo ' . $Portofolio->nama_umkm) }}"
       target="_blank"
       aria-label="Chat WhatsApp"
       class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white w-14 h-14 rounded-full shadow-xl flex items-center justify-center transition hover:scale-110">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-7 h-7"
             fill="currentColor"
             viewBox="0 0 24 24">
            <path d="M20.52 3.48A11.85 11.85 0 0012.07 0C5.5 0 .15 5.35.15 11.92c0 2.1.55 4.15 1.6 5.96L0 24l6.29-1.65a11.9 11.9 0 005.77 1.47h.01c6.57 0 11.92-5.35 11.92-11.92 0-3.18-1.24-6.17-3.47-8.42zM12.07 21.8h-.01a9.87 9.87 0 01-5.03-1.38l-.36-.21-3.73.98 1-3.64-.24-.37a9.86 9.86 0 01-1.51-5.26c0-5.45 4.44-9.89 9.9-9.89 2.64 0 5.12 1.03 6.99 2.9a9.82 9.82 0 012.89 6.99c0 5.46-4.44 9.89-9.9 9.89zm5.43-7.4c-.3-.15-1.77-.87-2.05-.97-.28-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.47-2.4-1.49-.89-.79-1.49-1.77-1.66-2.07-.18-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.48-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.49s1.07 2.89 1.22 3.09c.15.2 2.1 3.2 5.09 4.49.71.31 1.27.49 1.7.63.71.22 1.36.19 1.87.12.57-.09 1.77-.73 2.02-1.44.25-.72.25-1.32.17-1.44-.07-.13-.27-.2-.57-.35z"/>
        </svg>
    </a>

    <!-- JavaScript -->
    <script>
        document.getElementById('tahun').textContent =
            new Date().getFullYear();
    </script>

</body>
</html>
