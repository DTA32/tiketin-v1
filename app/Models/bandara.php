<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bandara extends Model
{
    use HasFactory;
    protected $table = 'bandara';
    protected $fillable = ['nama_bandara', 'kode_bandara', 'kota'];
}
