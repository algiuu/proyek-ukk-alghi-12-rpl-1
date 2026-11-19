<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function daftarUser(){
        $users = User::all();
        $admin = User::where("role", "admin")->get();
        return view('user.superadmin.user', compact('users', 'admin'));
    }

    public function keTambah(){
        return view('user.superadmin.tambah');
    }

    public function tambahUser(Request $request){
        $validate = $request->validate([
            'name' => 'required|string',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8'
        ]);
        if ($validate['password'] == $validate['password_confirmation']) {
            User::create([
                'name' => $validate['name'],
                'password' => Hash::make($validate['password'])
            ]);
            return redirect('/daftarUser');
        } else {
            return back()->withErrors('Password Tidak Sama Dengan Konfirmasi Password');
        }

    }

    public function hapusUser($id){
        User::destroy($id);
        return redirect('/daftarUser');
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

    return redirect('/daftarUser')->with('success', 'Data user berhasil diperbarui!');
}
}
