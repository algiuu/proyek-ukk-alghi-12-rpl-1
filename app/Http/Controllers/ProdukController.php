<?php

namespace App\Http\Controllers;
use App\Models\Portofolio;
use App\Models\produk;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function keTambahProduk($id)
{
    // Ambil data portofolio tunggal untuk judul di atas
    $portofolio = Portofolio::where('id_portofolio', $id)->firstOrFail();
    
    // Ambil semua daftar produk berdasarkan id_portofolio untuk tabel di bawah
    $produks = produk::where('id_portofolio', $id)->get();

    // Kirim kedua variabel ke view 'produk.index'
    return view('produk.index', compact('portofolio', 'produks'));
}
public function simpanProduk(Request $request, $id)
    {
        
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|numeric|min:0',
            'deskripsi'   => 'nullable|string',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimal 2MB
        ]);

        // 2. Handle upload file foto jika ada
        $pathFoto = null;
        if ($request->hasFile('foto_produk')) {
            // Disimpan ke folder storage/app/public/produk
            $pathFoto = $request->file('foto_produk')->store('portofolio/produk', 'public');
        }

        // 3. Simpan ke database menggunakan Model produk
       $this->withActivityUser(function () use ($id, $request, $pathFoto) {

    produk::create([
        'id_portofolio' => $id,
        'nama_produk' => $request->nama_produk,
        'harga_produk' => $request->harga,
        'deskripsi_produk' => $request->deskripsi,
        'foto_produk' => $pathFoto,
    ]);

});

        // 4. Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function keUpdateProduk($id)
    {
        // Cari data produk berdasarkan ID-nya
        $produk = produk::where('id_produk', $id)->firstOrFail();
        
        // Ambil data portofolio terkait untuk tombol kembali / info
        $portofolio = Portofolio::where('id_portofolio', $produk->id_portofolio)->firstOrFail();

        return view('produk.update', compact('produk', 'portofolio'));
    }

    // 2. Memproses update data produk
    public function updateProduk(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|numeric|min:0',
            'deskripsi'   => 'nullable|string',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

       $produk = produk::where('id_produk', $id)->firstOrFail();

        // Handle upload foto baru jika ada
        $pathFoto = $produk->foto_produk; // Tetap pakai foto lama jika tidak ganti
        if ($request->hasFile('foto_produk')) {
            // Hapus foto lama di storage jika ada
            if ($produk->foto_produk && Storage::disk('public')->exists($produk->foto_produk)) {
                Storage::disk('public')->delete($produk->foto_produk);
            }
            // Upload foto baru
            $pathFoto = $request->file('foto_produk')->store('portofolio/produk', 'public');
        }

        // Update data ke database
       $this->withActivityUser(function () use ($produk, $request, $pathFoto) {

    $produk->update([
        'nama_produk' => $request->nama_produk,
        'harga_produk' => $request->harga,
        'deskripsi_produk' => $request->deskripsi,
        'foto_produk' => $pathFoto,
    ]);

});

        // Redirect kembali ke halaman kelola produk portofolio tersebut
        return redirect('/tambahProduk/' . $produk->id_portofolio)
                         ->with('success', 'Produk berhasil diperbarui!');
    }

    // Method untuk menghapus produk
    public function hapusProduk($id)
    {
        // Cari produk berdasarkan id_produk
        $produk = produk::where('id_produk', $id)->firstOrFail();

        // Hapus file foto produk dari storage jika ada
        if ($produk->foto_produk && \Storage::disk('public')->exists($produk->foto_produk)) {
            \Storage::disk('public')->delete($produk->foto_produk);
        }

        // Simpan id_portofolio untuk redirect kembali nanti
        $idPortofolio = $produk->id_portofolio;

        // Hapus data dari database
        $this->withActivityUser(function () use ($produk) {
    $produk->delete();
});

        // Redirect kembali ke halaman kelola produk portofolio tersebut dengan pesan sukses
        return redirect('/tambahProduk/' . $idPortofolio)
                         ->with('success', 'Produk berhasil dihapus!');
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
