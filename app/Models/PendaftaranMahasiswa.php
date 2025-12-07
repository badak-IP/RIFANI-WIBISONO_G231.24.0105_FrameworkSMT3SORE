<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranMahasiswa extends Model
{
    use HasFactory;

    // Menentukan kolom-kolom yang bisa diisi
    protected $fillable = [
        'nim', 'nik', 'nama_mahasiswa', 'tempat_lahir', 'tanggal_lahir', 'id_progdi'
    ];

    /**
     * Relasi dengan tabel Progdi
     * Mahasiswa memiliki satu Program Studi
     */
    public function progdi()
    {
        return $this->belongsTo(Progdi::class, 'id_progdi');
    }
}
