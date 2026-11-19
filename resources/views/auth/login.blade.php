<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Portal UMKM</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='%239CAF88'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z' /%3E%3C/svg%3E">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <!-- Header / Logo -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <div class="mx-auto h-12 w-12 bg-emerald-600 text-white rounded-xl flex items-center justify-center shadow-md">
                <!-- Ikon Toko / UMKM -->
                <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                </svg>
            </div>
            <h2 class="mt-4 text-2xl font-bold tracking-tight text-slate-900">
                Masuk 
            </h2>
            <p class="mt-1 text-sm text-slate-600">
                Kelola profil usaha dan produk Anda dalam satu tempat
            </p>
        </div>

        <!-- Card Form Login -->
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md px-4 sm:px-0">
            <div class="bg-white py-8 px-6 shadow-sm border border-slate-200 rounded-2xl sm:px-10">
                
                <!-- Alert Error Global (Jika Login Gagal) -->
                @if ($errors->any())
                    <div class="mb-5 rounded-lg bg-red-50 p-3.5 border border-red-200">
                        <div class="flex items-center gap-2 text-sm text-red-700 font-medium">
                            <svg class="h-5 w-5 text-red-500 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif

                <form class="space-y-5" action="/login" method="POST">
                    @csrf

                    <!-- Input name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700">
                            Name
                        </label>
                        <div class="mt-1.5">
                            <input id="name" name="name" type="name" autocomplete="name" required
                                value="{{ old('name') }}"
                                placeholder="admin"
                                class="block w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-slate-900 placeholder-slate-400 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 sm:text-sm transition">
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium text-slate-700">
                                Kata Sandi
                            </label>
                        </div>
                        <div class="mt-1.5">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                placeholder="••••••••"
                                class="block w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-slate-900 placeholder-slate-400 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 sm:text-sm transition">
                        </div>
                    </div>


                  <!-- Tombol Submit & Kembali -->
                    <div class="flex items-center gap-3 pt-2">
                        <a href="/"
                            class="flex-1 justify-center rounded-lg bg-slate-100 hover:bg-slate-200 px-4 py-2.5 text-center text-sm font-semibold text-slate-700 shadow-sm transition cursor-pointer">
                            Kembali
                        </a>
                        <button type="submit"
                            class="flex-1 justify-center rounded-lg bg-emerald-600 hover:bg-emerald-700 px-4 py-2.5 text-center text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600 transition cursor-pointer">
                            Masuk Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
