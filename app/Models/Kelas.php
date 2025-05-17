<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['kode_kelas', 'mata_kuliah_id', 'semester'];

    public function mataKuliah() {
        return $this->belongsTo(MataKuliah::class);
    }

    public function jadwal() {
        return $this->hasOne(Jadwal::class);
    }

    public function krs() {
        return $this->hasMany(KRS::class);
    }
}
