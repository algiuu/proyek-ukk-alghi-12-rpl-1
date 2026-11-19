<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\produk;
use Illuminate\Support\Facades\Storage;
use App\Models\templates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PortofolioController extends Controller
{
    public function index($slug){
        $Portofolio = Portofolio::with('template')->where('slug', $slug)->firstOrFail();
        $produk = produk::where('id_portofolio', $Portofolio->id_portofolio)->get();
        if ($Portofolio->template->nama_template == "Kopi") {
            if($Portofolio->status == 'publish'){
                 return view('templates.kopi', compact('Portofolio', 'produk'));
            } else {
                abort(404);
            }
        } else if($Portofolio->template->nama_template ==  "Baso"){
            if($Portofolio->status == 'publish'){
                return view('templates.baso', compact('Portofolio', 'produk'));
            } else {
                abort(404);
            }
        } else if($Portofolio->template->nama_template == 'otak-otak'){
            if($Portofolio->status == 'publish'){
                return view('templates.otak_otak', compact('Portofolio', 'produk'));
            } else {
                abort(404);
            }
        }
    }
      public function keTambah(){
        $template = templates::all();
        return view('portofolio.tambah', compact('template'));
    }

    public function tambah(Request $request){
        $validate = $request->validate([
            'foto_umkm' => 'required|image|mimes:png,jpg,jpeg',
            'nama_umkm' => 'required|string',
            'slug'    => 'required|string|unique:portofolios,slug',
            'template' => 'required',
            'nomer_telepon' => 'required',
            'alamat' => 'required',
            'bio' => 'required',
            'status' => 'required|string'
        ]);
        $path_gambar = $request->file('foto_umkm')->store('portofolio/foto_umkm', 'public');

       $this->withActivityUser(function () use ($validate, $path_gambar) {

    Portofolio::create([
        'id_template' => $validate['template'],
        'nama_umkm' => $validate['nama_umkm'],
        'foto_umkm' => $path_gambar,
        'slug' => $validate['slug'],
        'nomer_telepon' => $validate['nomer_telepon'],
        'alamat' => $validate['alamat'],
        'bio' => $validate['bio'],
        'status' => $validate['status']
    ]);

});

        return redirect('/dashboard')->with('success', 'Data portofolio UMKM berhasil ditambahkan!');
    }

    public function hapus($id){
        $portofolio = Portofolio::findOrFail($id);
          if ($portofolio->foto_umkm && Storage::disk('public')->exists($portofolio->foto_umkm)) {
        Storage::disk('public')->delete($portofolio->foto_umkm);
    }
       $this->withActivityUser(function () use ($portofolio) {
    $portofolio->delete();
});
        return redirect('/dashboard')->with('success', 'Data portofolio UMKM berhasil dihapus!');
    }

   public function keUpdate($id)
{
    $portofolio = Portofolio::findOrFail($id);
    $template = templates::all();

    return view('portofolio.update', compact('portofolio', 'template'));
}

 public function update(Request $request, $id)
{
    $validate = $request->validate([
        'nama_umkm' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:portofolios,slug,' . $id . ',id_portofolio',
        'template' => 'required|exists:templates,id_template',
        'nomer_telepon' => 'required|string|max:20',
        'alamat' => 'required|string',
        'bio' => 'required|string',
        'foto_umkm' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        'status' => 'required|string'
    ]);

    $portofolio = Portofolio::findOrFail($id);

    // 1. Siapkan data teks yang pasti di-update
    $dataUpdate = [
        'id_template' => $validate['template'],
        'nama_umkm' => $validate['nama_umkm'],
        'slug' => $validate['slug'],
        'nomer_telepon' => $validate['nomer_telepon'],
        'alamat' => $validate['alamat'],
        'bio' => $validate['bio'],
        'status' => $validate['status']
    ];

    // 2. Cek apakah user mengupload foto baru
    if ($request->hasFile('foto_umkm')) {
        // Hapus foto lama dari storage jika ada
        if ($portofolio->foto_umkm && Storage::exists('public/portofolio' . $portofolio->foto_umkm)) {
            Storage::delete('public/' . $portofolio->foto_umkm);
        }
        
        // Simpan foto baru dan tambahkan ke array $dataUpdate
        $dataUpdate['foto_umkm'] = $request->file('foto_umkm')->store('portofolio/foto_umkm', 'public');
    }

    // 3. Update database sekaligus (teks + foto jika ada)
    $this->withActivityUser(function () use ($portofolio, $dataUpdate) {
    $portofolio->update($dataUpdate);
});

    return redirect('/dashboard')
        ->with('success', 'Data portofolio UMKM berhasil diperbarui!');
}
private function withActivityUser(callable $callback)
{
    return DB::transaction(function () use ($callback) {

        DB::statement(
            'SET @user_id = ?',
            [Auth::id()]
        );

        try {
            return $callback();
        } finally {
            DB::statement('SET @user_id = NULL');
        }
    });
}
}
