<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';   // ← GANTI DI SINI
    protected $primaryKey = 'id';

    protected $fillable = [
        'nim',
        'id_pri',
        'id_pro',
        'status'
    ];

    public function pribadi()
    {
        return $this->belongsTo(Pribadi::class, 'id_pri', 'id_pribadi');
    }

    public function progdi()
    {
        return $this->belongsTo(Progdi::class, 'id_pro', 'id_progdi');
    }
}
