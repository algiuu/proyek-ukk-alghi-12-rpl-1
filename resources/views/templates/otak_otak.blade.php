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

<body class="bg-sky-50 text-slate-800 font-sans antialiased">

@php
    $wa = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $Portofolio->nomer_telepon));
@endphp

<!-- NAVBAR -->
<nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-sky-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">

        <a href="#" class="text-xl font-black text-sky-800">
         {{ $Portofolio->nama_umkm }}
        </a>

        <div class="hidden md:flex gap-7 text-sm font-semibold text-slate-600">
            <a href="#tentang" class="hover:text-orange-500 transition">Tentang Kami</a>
            <a href="#produk" class="hover:text-orange-500 transition">Menu</a>
            <a href="#lokasi" class="hover:text-orange-500 transition">Kontak</a>
        </div>

        <a href="https://wa.me/{{ $wa }}" target="_blank"
           class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-full text-sm font-bold shadow-md transition">
            Pesan Sekarang
        </a>

    </div>
</nav>

<!-- HERO SECTION -->
<header class="bg-gradient-to-br from-sky-950 via-sky-800 to-cyan-700 text-white overflow-hidden">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-16 md:py-24 grid md:grid-cols-2 gap-12 items-center">

        <div class="space-y-6">

            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black leading-tight">
                {{ $Portofolio->nama_umkm }}
            </h1>

            <p class="text-sky-100 text-base md:text-lg leading-relaxed">
                {{ $Portofolio->bio }}
            </p>

            <div class="flex flex-wrap gap-3 pt-3">

                <a href="https://wa.me/{{ $wa }}?text={{ rawurlencode('Halo '.$Portofolio->nama_umkm.', saya ingin memesan otak-otak.') }}"
                   target="_blank"
                   class="bg-orange-500 hover:bg-orange-600 text-white px-7 py-3.5 rounded-xl font-bold shadow-lg transition">
                    Pesan Sekarang →
                </a>

                <a href="#produk"
                   class="bg-white/10 hover:bg-white/20 border border-white/30 px-7 py-3.5 rounded-xl font-semibold transition">
                    Lihat Menu
                </a>

            </div>

        </div>

        <div class="relative">

            <div class="absolute inset-0 bg-orange-400 rounded-full blur-3xl opacity-20"></div>

            <img src="{{ asset('storage/'.$Portofolio->foto_umkm) }}"
                 alt="Otak-Otak Seafood"
                 class="relative w-full h-80 md:h-[430px] object-cover rounded-3xl border-8 border-white/10 shadow-2xl">

        </div>

    </div>

</header>

<!-- ABOUT SECTION -->
<section id="tentang" class="py-20">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 grid md:grid-cols-2 gap-12 items-center">

        <div class="relative">
            <img src="{{ asset('storage/'.$Portofolio->foto_umkm) }}"
                 alt="Tentang Usaha"
                 class="w-full h-80 object-cover rounded-3xl shadow-xl">
        </div>

        <div class="space-y-5">

            <span class="text-orange-500 font-bold text-sm uppercase tracking-widest">
                Tentang Kami
            </span>

            <h2 class="text-3xl md:text-4xl font-black text-sky-950 leading-tight">
                {{ $Portofolio->nama_umkm }}
            </h2>

            <p class="text-slate-600 leading-relaxed">
                {{ $Portofolio->bio }}
            </p>

        </div>

    </div>

</section>

<!-- PRODUCT SECTION -->
<section id="produk" class="py-20 bg-white">

    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-12">

            <span class="text-orange-500 font-bold text-sm uppercase tracking-widest">
                🐟 Menu Spesial
            </span>

            <h2 class="text-3xl md:text-4xl font-black text-sky-950 mt-3">
                Pilihan Otak-Otak Favorit
            </h2>

            <p class="text-slate-500 mt-3">
                Temukan menu favoritmu dan nikmati kelezatannya.
            </p>

        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">

            @forelse ($produk as $prod)

            <div class="bg-sky-50 rounded-3xl overflow-hidden border border-sky-100 hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col">

                <div class="relative">

                    <img src="{{ asset('storage/'.$prod->foto_produk) }}"
                         alt="{{ $prod->nama_produk }}"
                         class="w-full h-56 object-cover">

                </div>

                <div class="p-6 flex-1 flex flex-col justify-between">

                    <div>

                        <h3 class="text-xl font-black text-sky-950">
                            {{ $prod->nama_produk }}
                        </h3>

                        <p class="text-slate-500 text-sm mt-2 leading-relaxed">
                            {{ $prod->deskripsi_produk }}
                        </p>

                    </div>

                    <div class="flex items-center justify-between mt-6 pt-5 border-t border-sky-200">

                        <div>
                            <p class="text-xs text-slate-400">Harga</p>

                            <p class="text-xl font-black text-orange-600">
                                Rp {{ number_format((float) $prod->harga_produk, 0, ',', '.') }}
                            </p>
                        </div>

                        <a href="https://wa.me/{{ $wa }}?text={{ rawurlencode('Halo, saya ingin memesan '.$prod->nama_produk) }}"
                           target="_blank"
                           class="bg-sky-800 hover:bg-sky-900 text-white px-4 py-2.5 rounded-xl text-sm font-bold transition">
                            Pesan →
                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-span-full text-center py-12">

                <p class="text-6xl mb-4">🐟</p>

                <h3 class="font-black text-xl text-sky-900">
                    Menu Belum Tersedia
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Silakan hubungi kami untuk mengetahui menu yang tersedia.
                </p>

            </div>

            @endforelse

        </div>

    </div>

</section>

<!-- LOCATION SECTION -->
<section id="lokasi" class="py-20">

    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <div class="bg-white rounded-3xl border border-sky-100 shadow-sm p-8 md:p-12 grid md:grid-cols-2 gap-10 items-center">

            <div class="space-y-5">

                <span class="text-orange-500 font-bold text-sm uppercase tracking-widest">
                    📍 Lokasi & Kontak
                </span>

                <h2 class="text-3xl font-black text-sky-950">
                    Yuk, Kunjungi Tempat Kami!
                </h2>

                <p class="text-slate-500 text-sm leading-relaxed">
                    Kami siap melayani pesanan Anda. Hubungi kami untuk informasi produk dan pemesanan.
                </p>

                <div class="space-y-5 pt-3">

                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                            Alamat Lengkap
                        </p>

                        <p class="font-semibold mt-2 text-slate-800">
                            {{ $Portofolio->alamat }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                            Nomor Telepon
                        </p>

                        <p class="font-semibold mt-2 text-slate-800">
                            {{ $Portofolio->nomer_telepon }}
                        </p>
                    </div>

                </div>

                <a href="https://wa.me/{{ $wa }}"
                   target="_blank"
                   class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white px-7 py-3 rounded-xl font-bold transition">
                    Hubungi WhatsApp
                </a>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="max-w-6xl mx-auto px-4 sm:px-6 pb-20">

    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-3xl p-8 md:p-14 text-center text-white shadow-lg">

        <span class="text-orange-100 text-sm font-bold uppercase tracking-widest">
            Seafood Lovers!
        </span>

        <h2 class="text-3xl md:text-4xl font-black mt-4">
            Sudah Siap Menikmati Otak-Otak?
        </h2>

        <p class="text-orange-100 mt-4 max-w-xl mx-auto">
            Jangan lewatkan kelezatan produk lokal kami.
            Hubungi kami dan pesan menu favoritmu sekarang!
        </p>

        <a href="https://wa.me/{{ $wa }}?text={{ rawurlencode('Halo '.$Portofolio->nama_umkm.', saya ingin memesan.') }}"
           target="_blank"
           class="inline-block mt-7 bg-white hover:bg-sky-50 text-orange-600 px-8 py-4 rounded-xl font-black shadow transition">
            Pesan Melalui WhatsApp →
        </a>

    </div>

</section>

<!-- FOOTER -->
<footer class="bg-sky-950 text-sky-100">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">

        <div class="grid md:grid-cols-2 gap-8">

            <div>

                <h3 class="text-2xl font-black text-white">
                    🐟 {{ $Portofolio->nama_umkm }}
                </h3>

                <p class="text-sm text-sky-300 mt-4 max-w-md leading-relaxed">
                    {{ $Portofolio->bio }}
                </p>

            </div>

            <div class="md:text-right">

                <h3 class="font-bold text-white mb-4">Navigasi</h3>

                <div class="flex md:justify-end gap-5 text-sm">
                    <a href="#tentang" class="hover:text-orange-400">Tentang</a>
                    <a href="#produk" class="hover:text-orange-400">Menu</a>
                    <a href="#lokasi" class="hover:text-orange-400">Kontak</a>
                </div>

            </div>

        </div>

        <div class="border-t border-sky-800 mt-10 pt-6 flex flex-col sm:flex-row justify-between gap-3 text-xs text-sky-400">

            <p>
                © <span id="tahun"></span> {{ $Portofolio->nama_umkm }}.
                Hak Cipta Dilindungi.
            </p>

            <p>Bagian dari Portal UMKM Indonesia</p>

        </div>

    </div>

</footer>

<!-- FLOATING WHATSAPP -->
<a href="https://wa.me/{{ $wa }}?text={{ rawurlencode('Halo '.$Portofolio->nama_umkm) }}"
   target="_blank"
   aria-label="Chat WhatsApp"
   class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white w-14 h-14 rounded-full shadow-xl flex items-center justify-center text-2xl transition hover:scale-110">
    <svg xmlns="http://www.w3.org/2000/svg"
             class="w-7 h-7"
             fill="currentColor"
             viewBox="0 0 24 24">
            <path d="M20.52 3.48A11.85 11.85 0 0012.07 0C5.5 0 .15 5.35.15 11.92c0 2.1.55 4.15 1.6 5.96L0 24l6.29-1.65a11.9 11.9 0 005.77 1.47h.01c6.57 0 11.92-5.35 11.92-11.92 0-3.18-1.24-6.17-3.47-8.42zM12.07 21.8h-.01a9.87 9.87 0 01-5.03-1.38l-.36-.21-3.73.98 1-3.64-.24-.37a9.86 9.86 0 01-1.51-5.26c0-5.45 4.44-9.89 9.9-9.89 2.64 0 5.12 1.03 6.99 2.9a9.82 9.82 0 012.89 6.99c0 5.46-4.44 9.89-9.9 9.89zm5.43-7.4c-.3-.15-1.77-.87-2.05-.97-.28-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.47-2.4-1.49-.89-.79-1.49-1.77-1.66-2.07-.18-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.48-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.49s1.07 2.89 1.22 3.09c.15.2 2.1 3.2 5.09 4.49.71.31 1.27.49 1.7.63.71.22 1.36.19 1.87.12.57-.09 1.77-.73 2.02-1.44.25-.72.25-1.32.17-1.44-.07-.13-.27-.2-.57-.35z"/>
        </svg>
</a>

<script>
    document.getElementById('tahun').textContent = new Date().getFullYear();
</script>

</body>
</html>
