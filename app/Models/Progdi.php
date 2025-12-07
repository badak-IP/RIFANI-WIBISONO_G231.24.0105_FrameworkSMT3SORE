<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progdi extends Model
{
    use HasFactory;

    // Menentukan primary key yang digunakan (jika tidak menggunakan id secara default)
    protected $primaryKey = 'id_progdi';

    // Menentukan apakah tabel ini menggunakan timestamps atau tidak
    public $timestamps = true;

    // Field yang boleh diisi (mass assignment)
    protected $fillable = [
        'nm_fakultas', 
        'nm_progdi'
    ];

    /**
     * Relasi dengan tabel PendaftaranMahasiswa
     * Program Studi (Progdi) memiliki banyak mahasiswa.
     */
    public function pendaftaranMahasiswas()
    {
        return $this->hasMany(PendaftaranMahasiswa::class, 'id_progdi');
    }
}
