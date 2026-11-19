<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Portal UMKM</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='%239CAF88'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z' /%3E%3C/svg%3E">
    <!-- CDN Tailwind CSS v4 -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">
        <div class="max-w-xl w-full bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            
            <!-- Header Card -->
            <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between bg-slate-50/50">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Edit Akun Pengguna</h1>
                    <p class="text-xs text-slate-500 mt-0.5">Perbarui informasi akun admin untuk sistem portal UMKM</p>
                </div>
                <a href="/daftarUser" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition flex items-center gap-1">
                    &larr; Kembali
                </a>
            </div>

            <!-- Menampilkan Pesan Error Validasi (Jika Ada) -->
            @if ($errors->any())
                <div class="mx-6 mt-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm">
                    <p class="font-semibold mb-1">Terjadi kesalahan pengisian:</p>
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Edit Data User -->
            <form action="/editUser/{{ $user->id }}" method="POST" class="p-6 space-y-5">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" placeholder="Contoh: Budi Santoso" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm transition">
                </div>

                <!-- Password Baru (Opsional saat Edit) -->
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Kata Sandi Baru (Opsional)</label>
                    <input type="password" name="password" id="password" placeholder="Kosongkan jika tidak ingin mengubah password"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm transition">
                    <p class="text-xs text-slate-400 mt-1">Biarkan kosong jika password tidak ingin diganti.</p>
                </div>

                <!-- Konfirmasi Password Baru -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1.5">Konfirmasi Kata Sandi Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password baru"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm transition">
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                    <a href="/daftarUser" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 font-medium text-sm transition">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-sm shadow-sm transition cursor-pointer">
                        Perbarui Pengguna
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>