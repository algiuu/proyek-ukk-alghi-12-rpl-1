<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    protected $primaryKey = 'id_log';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'tabel',
        'aksi',
        'deskripsi',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}