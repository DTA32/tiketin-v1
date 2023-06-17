<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan_penumpang extends Model
{
    use HasFactory;
    protected $table = 'pemesanan_penumpang';
    protected $fillable = ['pemesanan_id', 'nama', 'kursi_penerbangan'];
}
