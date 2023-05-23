<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'String';
    protected $fillable = [
        'id',
           'nama_fakultas',
            'nama_dekan',
            'nama_wakil_dekan',
    ];
    public function prodi(){
        return $this->hasMany(Prodi::class);
    }
}
