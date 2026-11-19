<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'id_template',
    'foto_umkm',
    'nama_umkm',
    'alamat',
    'bio',
    'slug',
    'nomer_telepon',
    'status'
])]
class Portofolio extends Model
{
    protected $table = 'portofolios';
    protected $primaryKey = 'id_portofolio';
    public function template()
    {
        return $this->belongsTo(templates::class, 'id_template', 'id_template');
    }
}