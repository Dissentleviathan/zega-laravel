<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'String';
    protected $fillable = [
        'id',
            'nama_prodi',
            'fakultas_id',
    ];

    protected $table='prodi';

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}