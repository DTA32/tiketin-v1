<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan_harga extends Model
{
    use HasFactory;
    protected $table = 'pemesanan_harga';
    protected $fillable = ['pemesanan_id', 'biaya_dasar', 'kuantitas', 'biaya_layanan', 'total'];
}
