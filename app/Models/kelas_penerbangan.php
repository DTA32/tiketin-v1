<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class kelas_penerbangan extends Model
{
    use HasFactory;
    protected $table = 'kelas_penerbangan';
    protected $fillable = ['penerbangan_id', 'tipe_kelas', 'harga', 'jumlah_kursi', 'seat_layout'];
    public function penerbangan(): BelongsTo
    {
        return $this->belongsTo(penerbangan::class);
    }
}
