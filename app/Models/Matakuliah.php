<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = ['kode', 'nama', 'sks', 'semester'];

    public function dosens() {
        return $this->belongsToMany(Dosen::class, 'dosen_mata_kuliah');
    }

    public function kelas() {
        return $this->hasMany(Kelas::class);
    }
}
