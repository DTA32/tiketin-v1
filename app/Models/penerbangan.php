<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerbangan extends Model
{
    use HasFactory;
    protected $table = 'penerbangan';
    protected $fillable = ['bandara_asal_id', 'bandara_tujuan_id', 'waktu_berangkat', 'waktu_sampai', 'maskapai', 'tipe_pesawat'];
    protected $casts = [
        'waktu_berangkat' => 'datetime',
        'waktu_sampai' => 'datetime',
    ];
}
