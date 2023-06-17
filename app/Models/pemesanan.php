<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = ['penerbangan_id', 'status', 'metode_pembayaran', 'referensi_pembayaran', 'kelas_penerbangan_id'];
    public function penerbangan(): BelongsTo
    {
        return $this->belongsTo(penerbangan::class);
    }
    public function pemesanan_harga(): HasOne
    {
        return $this->hasOne(pemesanan_harga::class);
    }
    public function pemesanan_penumpang(): HasMany
    {
        return $this->hasMany(pemesanan_penumpang::class);
    }
}
