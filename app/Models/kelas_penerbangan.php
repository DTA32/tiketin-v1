<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas_penerbangan extends Model
{
    use HasFactory;
    protected $table = 'kelas_penerbangan';
    protected $fillable = ['penerbangan_id', 'tipe_kelas', 'harga'];
}
