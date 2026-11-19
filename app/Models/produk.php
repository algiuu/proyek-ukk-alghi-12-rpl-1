<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nama_produk','harga_produk', 'deskripsi_produk', 'id_portofolio', 'foto_produk'])]
class produk extends Model
{
    protected $primaryKey = 'id_produk';
}
