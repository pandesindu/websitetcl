<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis','user_id', 'jk_siswa', 'alamat_siswa', 'ttl_siswa', 'no_hp'
    ];

    // public function siswa()
    // {
    //     return $this->hasOne(Siswa::class);
    // }
}
