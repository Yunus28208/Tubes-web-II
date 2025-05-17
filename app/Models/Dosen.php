<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['user_id', 'nip', 'nama', 'bidang_keahlian'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function mataKuliahs() {
        return $this->belongsToMany(MataKuliah::class, 'dosen_mata_kuliah');
    }
}
