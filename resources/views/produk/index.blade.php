<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - Portal UMKM</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='%239CAF88'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z' /%3E%3C/svg%3E">

    <!-- CDN Tailwind CSS v4 -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    <div class="min-h-screen flex flex-col">
        
        <!-- TOPBAR / NAVBAR ATAS -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-8">
            <div class="flex items-center gap-3">
                <div class="h-9 w-9 bg-emerald-600 text-white rounded-lg flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                    </svg>
                </div>
                <h1 class="text-base sm:text-lg font-semibold text-slate-800">Manajemen Produk: <span class="text-emerald-600">{{ $portofolio->nama_umkm ?? 'Keripik Pisang Barokah' }}</span></h1>
            </div>

            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-slate-800">{{ Auth::user()->name ?? 'Admin' }}</p>
                    <p class="text-xs text-slate-500 capitalize">{{ Auth::user()->role ?? 'admin' }}</p>
                </div>
            </div>
        </header>

        <!-- MAIN CONTENT (FULL WIDTH TANPA SIDEBAR) -->
        <main class="flex-1 p-4 sm:p-8 space-y-8 max-w-7xl mx-auto w-full">
            
            <!-- BAGIAN ATAS: FORM TAMBAH PRODUK -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-xs p-6">
                <div class="mb-5 pb-4 border-b border-slate-200">
                    <h2 class="text-base font-semibold text-slate-800">Tambah Produk Baru</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Isi form di bawah untuk menambahkan produk ke portofolio UMKM ini.</p>
                </div>

                <form action="/simpanProduk/{{ $portofolio->id_portofolio ?? 1 }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Nama Produk -->
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Nama Produk</label>
                            <input type="text" name="nama_produk" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Contoh: Keripik Pisang Keju">
                        </div>

                        <!-- Harga Produk -->
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Harga (Rp)</label>
                            <input type="number" name="harga" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Contoh: 15000">
                        </div>

                        <!-- Foto Produk -->
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Foto Produk</label>
                            <input type="file" name="foto_produk" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer">
                        </div>
                    </div>

                    <!-- Deskripsi Produk -->
                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1">Deskripsi Produk</label>
                        <textarea name="deskripsi" rows="2" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Tuliskan deskripsi singkat produk..."></textarea>
                    </div>

                    <!-- Tombol Aksi (Simpan & Batal) -->
                    <div class="flex justify-end gap-2 pt-2">
                        <a href="/dashboard" class="px-5 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-sm font-medium transition cursor-pointer shadow-sm text-center">
                            Batal
                        </a>
                        <button type="submit" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-medium transition cursor-pointer shadow-sm">
                            Simpan Produk
                        </button>
                    </div>
                </form>
            </div>

            <!-- BAGIAN BAWAH: LIST / DAFTAR PRODUK -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between">
                    <div>
                        <h2 class="text-base font-semibold text-slate-800">Daftar Produk UMKM</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Semua produk yang terdaftar pada portofolio ini</p>
                    </div>
                    <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">
                        Total: {{ isset($produks) ? $produks->count() : 2 }} Produk
                    </span>
                </div>

                <div class="w-full overflow-x-auto">
                    <table class="w-full text-left border-collapse table-auto">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                <th class="px-6 py-3.5 w-16">Foto</th>
                                <th class="px-6 py-3.5 w-1/4">Nama Produk</th>
                                <th class="px-6 py-3.5 w-32">Harga</th>
                                <th class="px-6 py-3.5 w-2/5">Deskripsi</th>
                                <th class="px-6 py-3.5 text-right whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 text-sm">
                            @forelse($produks ?? [] as $produk)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-3">
                                    <div class="h-10 w-10 bg-slate-100 rounded-lg overflow-hidden flex items-center justify-center border border-slate-200">
                                        @if($produk->foto_produk)
                                            <img src="{{ asset('storage/' . $produk->foto_produk) }}" alt="Foto" class="h-full w-full object-cover">
                                        @else
                                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-3 font-medium text-slate-900">{{ $produk->nama_produk }}</td>
                                <td class="px-6 py-3 text-slate-700 font-semibold">Rp {{ number_format($produk->harga_produk, 0, ',', '.') }}</td>
                                <td class="px-6 py-3 text-slate-600">
                                    <div class="truncate max-w-xs" title="{{ $produk->deskripsi_produk }}">{{ $produk->deskripsi_produk }}</div>
                                </td>
                                <td class="px-6 py-3 text-right whitespace-nowrap">
                                    <div class="inline-flex items-center justify-end gap-2">
                                        <a href="/updateProduk/{{ $produk->id_produk }}" class="px-2 py-1 text-emerald-600 hover:text-emerald-800 font-medium text-xs transition">Edit</a>
                                        <form action="/hapusProduk/{{ $produk->id_produk }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 py-1 text-red-600 hover:text-red-800 font-medium text-xs transition cursor-pointer">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <p class="text-slate-600 font-medium text-base">
                                Tidak ada Produk
                            </p>
                            <p class="text-xs text-slate-400 mt-2">
                                Belum ada Produk yang terdaftar.
                            </p>
                        </td>
                    </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
</body>
</html>