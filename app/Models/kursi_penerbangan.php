<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kursi_penerbangan extends Model
{
    use HasFactory;
    protected $table = 'kursi_penerbangan';
    protected $fillable = [
        'kelas_id',
        'nomor_kursi',
        'status_kursi',
        'penerbangan_id',
    ];
}
