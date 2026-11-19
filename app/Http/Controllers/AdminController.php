<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\Portofolio;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $portofolios = Portofolio::all();
        $logs = ActivityLog::with('user')
        ->latest('created_at')
        ->take(10)
        ->get();
        return view('dashboard', compact('portofolios', 'logs'));
    }
    public function keEdit($id){
        $user = User::where('id', $id)->firstOrFail();
        return view('user.edit', compact('user'));
    }

   public function editUser(Request $request, $id) // atau nama fungsi update Anda
{
    // 1. Validasi (buat password menjadi nullable/tidak wajib)
    $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'nullable|min:6|confirmed', // 'confirmed' otomatis mengecek password_confirmation
    ]);

    // 2. Cari data user berdasarkan ID
    $user = User::findOrFail($id);

    // 3. Siapkan data dasar yang pasti diubah (nama)
    $dataToUpdate = [
        'name' => $request->name,
    ];

    // 4. Cek apakah user mengisi password baru atau tidak
    if ($request->filled('password')) {
        // Jika diisi, masukkan password baru yang sudah di-hash
        $dataToUpdate['password'] = Hash::make($request->password);
    }

    // 5. Update data ke database
    $user->update($dataToUpdate);

    return redirect('/dashboard')->with('success', 'Data user berhasil diperbarui!');
}

  
}
