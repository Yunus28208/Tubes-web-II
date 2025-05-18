<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    protected $table = 'krs'; 
    protected $fillable = ['mahasiswa_id', 'kelas_id', 'tahun_ajaran', 'semester'];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }

    public function khs() {
        return $this->hasOne(KHS::class);
    }

    public function absensi() {
        return $this->hasMany(Absensi::class);
    }
}

