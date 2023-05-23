<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'String';
    protected $fillable = [
        'id',
            'nama_mahasiswa',
            'npm',
            'tanggal_lahir',
            'kota_lahir',
            'foto',
            'prodi_id',
    ];

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
    public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }
}