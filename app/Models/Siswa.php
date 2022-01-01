<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis', 'nama_siswa', 'kelas_id', 'user_id'
    ];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
