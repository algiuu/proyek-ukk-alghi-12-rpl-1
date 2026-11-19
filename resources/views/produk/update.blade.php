<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Portal UMKM</title>
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
                <h1 class="text-base sm:text-lg font-semibold text-slate-800">Edit Produk: <span class="text-emerald-600">{{ $produk->nama_produk }}</span></h1>
            </div>

            <div class="flex items-center gap-4">
                <a href="/tambahProduk/{{ $portofolio->id_portofolio }}" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition">
                    &larr; Kembali
                </a>
            </div>
        </header>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-4 sm:p-8 space-y-8 max-w-4xl mx-auto w-full">
            
            <div class="bg-white rounded-xl border border-slate-200 shadow-xs p-6">
                <div class="mb-5 pb-4 border-b border-slate-200">
                    <h2 class="text-base font-semibold text-slate-800">Form Perubahan Data Produk</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Silakan perbarui informasi produk untuk UMKM <strong>{{ $portofolio->nama_umkm }}</strong>.</p>
                </div>

                <form action="/updateProduk/{{ $produk->id_produk }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Nama Produk -->
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Nama Produk</label>
                            <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <!-- Harga Produk -->
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Harga (Rp)</label>
                            <input type="number" name="harga" value="{{ old('harga', $produk->harga_produk) }}" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>

                    <!-- Foto Produk & Preview -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center pt-2">
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Ganti Foto Produk (Opsional)</label>
                            <input type="file" name="foto_produk" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer">
                            <p class="text-[11px] text-slate-400 mt-1">Biarkan kosong jika tidak ingin mengubah foto.</p>
                        </div>

                        @if($produk->foto_produk)
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-slate-500">Foto Saat Ini:</span>
                            <div class="h-16 w-16 rounded-lg border border-slate-200 overflow-hidden bg-slate-100">
                                <img src="{{ asset('storage/' . $produk->foto_produk) }}" alt="Foto Produk" class="h-full w-full object-cover">
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Deskripsi Produk -->
                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1">Deskripsi Produk</label>
                        <textarea name="deskripsi" rows="3" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">{{ old('deskripsi', $produk->deskripsi_produk) }}</textarea>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end gap-2 pt-4 border-t border-slate-100">
                        <a href="/tambahProduk/{{ $portofolio->id_portofolio }}" class="px-5 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-sm font-medium transition cursor-pointer shadow-sm text-center">
                            Batal
                        </a>
                        <button type="submit" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-medium transition cursor-pointer shadow-sm">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </main>
    </div>
</body>
</html> 