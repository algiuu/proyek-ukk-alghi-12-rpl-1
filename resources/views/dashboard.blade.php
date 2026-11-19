<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Portal UMKM</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='%239CAF88'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z' /%3E%3C/svg%3E">

    <!-- CDN Tailwind CSS v4 -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    <div class="min-h-screen flex">
        
        <!-- Backdrop Gelap untuk Mobile saat Sidebar Terbuka -->
        <div id="sidebar-backdrop" onclick="toggleSidebar()" class="fixed inset-0 bg-slate-900/50 z-20 hidden lg:hidden"></div>

        <!-- SIDEBAR -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-white border-r border-slate-200 transform -translate-x-full transition-transform duration-200 ease-in-out lg:translate-x-0 lg:sticky lg:top-0 lg:h-screen shrink-0 flex flex-col">
            
            <!-- Brand / Logo -->
            <div class="h-16 flex items-center gap-3 px-6 border-b border-slate-200">
                <div class="h-9 w-9 bg-emerald-600 text-white rounded-lg flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                    </svg>
                </div>
                <span class="font-bold text-lg text-slate-900 tracking-tight">Portal UMKM</span>
            </div>

            <!-- Menu Navigasi -->
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <p class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</p>
                
                <!-- Menu Aktif: Dashboard -->
                <a href="/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-emerald-50 text-emerald-700 font-medium text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                    </svg>
                    Dashboard
                </a>

                @if (auth()->user()->role == "admin")
                    <a href="/editUserAdmin/{{ Auth::id() }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 font-medium text-sm transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        Edit User
                    </a>
                @endif

                @if (auth()->user()->role == "superadmin")
                    <a href="/daftarUser" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 font-medium text-sm transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        Manajemen User
                    </a>
                @endif
            </nav>

            <!-- Tombol Logout di Bawah Sidebar -->
            <div class="p-4 border-t border-slate-200">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-red-600 hover:bg-red-50 font-medium text-sm transition cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                        Keluar (Logout)
                    </button>
                </form>
            </div>
        </aside>

        <!-- AREA KONTEN KANAN -->
        <div class="flex-1 flex flex-col min-w-0">
            
            <!-- Topbar / Header -->
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-8">
                <!-- Tombol Hamburger Mobile -->
                <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <h1 class="text-lg font-semibold text-slate-800 hidden sm:block">Manajemen Portofolio UMKM</h1>

                <!-- Info User yang Sedang Login -->
                <div class="flex items-center gap-3 ml-auto">
                    <div class="text-right">
                        <p class="text-sm font-bold text-slate-800">{{ Auth::user()->name ?? 'Admin UMKM' }}</p>
                        <p class="text-xs text-slate-500 capitalize">{{ Auth::user()->role ?? 'admin' }}</p>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-4 sm:p-8 space-y-6 max-w-full overflow-hidden">
                
                <!-- Kartu Statistik -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-xs">
                        <p class="text-sm font-medium text-slate-500">Total Portofolio UMKM</p>
                        <p class="text-3xl font-bold text-slate-900 mt-2">{{ $portofolios->count() ?? 124 }}</p>
                        <p class="text-xs text-emerald-600 font-medium mt-2">Data tersinkronisasi</p>
                    </div>
                </div>

                
<!-- TABEL DATA PORTOFOLIO -->
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">

    <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between flex-wrap gap-4">
        <div>
            <h2 class="text-base font-semibold text-slate-800">Daftar Portofolio UMKM</h2>
            <p class="text-xs text-slate-500 mt-0.5">
                Menampilkan data berdasarkan tabel portofolios
            </p>
        </div>

        @if($portofolios->count() != 0)
            <a href="/tambahPortofolio"
                class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-medium transition">
                + Tambah Portofolio
            </a>
        @endif
    </div>

    <div class="w-full overflow-x-auto">
        <table class="w-full text-left border-collapse table-auto">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                    <th class="px-4 py-3.5">Nama UMKM</th>
                    <th class="px-4 py-3.5">Alamat</th>
                    <th class="px-4 py-3.5">Status</th>
                    <th class="px-4 py-3.5">No. Telepon</th>
                    <th class="px-4 py-3.5">Bio Singkat</th>
                    <th class="px-4 py-3.5 text-right">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200 text-sm">
                @forelse($portofolios as $item)
                    <tr class="hover:bg-slate-50 transition">

                        <td class="px-4 py-4 font-medium text-slate-900">
                            <div class="truncate max-w-[200px]" title="{{ $item->nama_umkm }}">
                                {{ $item->nama_umkm }}
                            </div>
                            <span class="block text-xs text-slate-400 font-normal">
                                slug: {{ $item->slug }}
                            </span>
                        </td>

                        <td class="px-4 py-4 text-slate-600">
                            <div class="truncate max-w-[180px]" title="{{ $item->alamat }}">
                                {{ $item->alamat }}
                            </div>
                        </td>

                        <td class="px-4 py-4 whitespace-nowrap">
                            @if($item->status == "publish")
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                    {{ $item->status }}
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    {{ $item->status }}
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-4 text-slate-600 whitespace-nowrap">
                            {{ $item->nomer_telepon }}
                        </td>

                        <td class="px-4 py-4 text-slate-600">
                            <div class="truncate max-w-[220px]" title="{{ $item->bio }}">
                                {{ $item->bio }}
                            </div>
                        </td>

                        <td class="px-4 py-4 text-right whitespace-nowrap">
                            <div class="inline-flex items-center justify-end gap-1.5">

                                <a href="/tambahProduk/{{ $item->id_portofolio }}"
                                    class="px-2 py-1 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-md text-xs font-medium">
                                    Produk
                                </a>

                                <a href="/{{ $item->slug }}"
                                    class="px-2 py-1 text-slate-600 hover:text-slate-900 text-xs font-medium">
                                    Lihat
                                </a>

                                <a href="/updatePortofolio/{{ $item->id_portofolio }}"
                                    class="px-2 py-1 text-emerald-600 hover:text-emerald-800 text-xs font-medium">
                                    Edit
                                </a>

                                <form action="/hapusPortofolio/{{ $item->id_portofolio }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="px-2 py-1 text-red-600 hover:text-red-800 text-xs font-medium cursor-pointer">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <p class="text-slate-600 font-medium text-base">
                                Tidak ada Website
                            </p>
                            <p class="text-xs text-slate-400 mt-2">
                                Belum ada Website UMKM yang terdaftar.
                            </p>

                            <a href="/tambahPortofolio"
                                class="inline-flex mt-4 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-medium">
                                + Tambah Website UMKM Baru
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


<!-- ACTIVITY LOG -->
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">

    <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between flex-wrap gap-3">
        <div>
            <h2 class="text-base font-semibold text-slate-800">
                Riwayat Aktivitas Admin
            </h2>

            <p class="text-xs text-slate-500 mt-1">
                Menampilkan 10 aktivitas terakhir admin dan superadmin
            </p>
        </div>
    </div>

    <div class="w-full overflow-x-auto">
        <table class="w-full text-left border-collapse">

            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase">
                    <th class="px-6 py-3">Admin</th>
                    <th class="px-6 py-3">Tabel</th>
                    <th class="px-6 py-3">Aktivitas</th>
                    <th class="px-6 py-3">Deskripsi</th>
                    <th class="px-6 py-3">Waktu</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200 text-sm">

                @forelse($logs as $log)

                    <tr class="hover:bg-slate-50 transition">

                        <td class="px-6 py-4 font-medium text-slate-800 whitespace-nowrap">
                            {{ $log->user->name ?? 'User tidak diketahui' }}
                        </td>

                        <td class="px-6 py-4 text-slate-600">
                            {{ $log->tabel }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">

                            @if($log->aksi == 'INSERT')
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">
                                    INSERT
                                </span>

                            @elseif($log->aksi == 'UPDATE')
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-700">
                                    UPDATE
                                </span>

                            @elseif($log->aksi == 'DELETE')
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                    DELETE
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-xs bg-slate-100 text-slate-700">
                                    {{ $log->aksi }}
                                </span>
                            @endif

                        </td>

                        <td class="px-6 py-4 text-slate-600 min-w-[200px]">
                            {{ $log->deskripsi }}
                        </td>

                        <td class="px-6 py-4 text-xs text-slate-500 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y H:i') }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-slate-400">
                            Belum ada aktivitas yang tercatat.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>
<!-- END ACTIVITY LOG -->


            </main>
        </div>
    </div>

    <!-- Script Toggle Sidebar Mobile -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
        }
    </script>
</body>
</html>