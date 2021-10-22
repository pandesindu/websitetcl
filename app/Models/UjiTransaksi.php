<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjiTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'siswa_id', 'semester_siswa', 'jumlah_pembayaran'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
