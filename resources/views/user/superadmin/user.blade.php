<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - Portal UMKM</title>
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
                
                <a href="/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 font-medium text-sm transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-slate-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                    </svg>
                    Dashboard
                </a>

                <!-- Menu Aktif: Manajemen User -->
                <a href="/daftarUser" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-emerald-50 text-emerald-700 font-medium text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    Manajemen User
                </a>
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

                <h1 class="text-lg font-semibold text-slate-800 hidden sm:block">Manajemen Pengguna (Users)</h1>

                <!-- Info User yang Sedang Login -->
                <div class="flex items-center gap-3 ml-auto">
                    <div class="text-right">
                        <p class="text-sm font-bold text-slate-800">{{ Auth::user()->name ?? 'Admin UMKM' }}</p>
                        <p class="text-xs text-slate-500 capitalize">{{ Auth::user()->role ?? 'admin' }}</p>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-4 sm:p-8 space-y-6">
                
                <!-- Bagian Grid Statistik & Tombol Aksi Superadmin -->
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 items-center">
                    
                    <!-- Kartu Statistik (Mengambil 3 kolom di layar besar) -->
                    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-xs lg:col-span-3">
                        <p class="text-sm font-medium text-slate-500">Total Admin Terdaftar</p>
                        <p class="text-3xl font-bold text-slate-900 mt-2">{{ isset($users) ? $admin->count() : 5 }}</p>
                        <p class="text-xs text-emerald-600 font-medium mt-2">Data tersinkronisasi dari database</p>
                    </div>

                    <!-- Tombol Edit / Aksi Superadmin (Mengambil 1 kolom di sebelah kanan) -->
                    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-xs flex flex-col justify-center gap-3 h-full">
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Aksi Superadmin</p>
                        
                        <!-- Sesuaikan ID / Route sesuai data akun superadmin yang sedang login -->
                        <a href="/editUser/{{ Auth::id() }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-medium transition shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                            Edit Profil Saya
                        </a>
                    </div>

                </div>

                
                <!-- Tabel Data Sesuai Kolom Migrasi Users -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-semibold text-slate-800">Daftar Akun Pengguna</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Menampilkan data berdasarkan tabel users</p>
                        </div>
                        @if ($admin->isNotEmpty())
                        <a href="/tambahUser" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-medium transition">
                            + Tambah User
                        </a>
                        @endif
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                    <th class="px-6 py-3.5">ID</th>
                                    <th class="px-6 py-3.5">Nama Lengkap</th>
                                    <th class="px-6 py-3.5">Role / Hak Akses</th>
                                    <th class="px-6 py-3.5">Dibuat Pada</th>
                                    <th class="px-6 py-3.5 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-sm">
                                @forelse($admin as $adm)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4 font-mono text-slate-500 text-xs">{{ $adm->id }}</td>
                                    <td class="px-6 py-4 font-medium text-slate-900">
                                        {{ $adm->name }}
                                    </td>
                                    <td class="px-6 py-4 text-slate-600">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $adm->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ ucfirst($adm->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-slate-500 text-xs">{{ $adm->created_at ? $adm->created_at->format('d M Y, H:i') : '-' }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-3">
                                            <a href="/editUser/{{ $adm->id }}" class="text-emerald-600 hover:text-emerald-800 font-medium">Edit</a>
                                            <form action="/hapusUser/{{ $adm->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium cursor-pointer">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                               @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center space-y-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-400">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                            <p class="text-slate-600 font-medium text-base">Tidak ada Admin</p>
                                            <p class="text-xs text-slate-400 max-w-xs">Belum ada akun admin yang terdaftar di dalam database sistem saat ini.</p>
                                            <div class="pt-2">
                                                <a href="/tambahUser" class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-medium transition shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                    Tambah User Baru
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

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