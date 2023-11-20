<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kelas_penerbangan;
use Illuminate\Support\Facades\Storage;

class KelasPenerbanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas_penerbangan = [
            [
                'penerbangan_id' => 3,
                'tipe_kelas' => 3,
                'harga' => 1000000,
                'jumlah_kursi' => 40,
                'seat_layout' => Storage::disk('local')->get('seatLayout/example.json'),
            ],
            [
                'penerbangan_id' => 4,
                'tipe_kelas' => 1,
                'harga' => 850000,
                'jumlah_kursi' => 40,
                'seat_layout' => Storage::disk('local')->get('seatLayout/example.json'),
            ],
            [
                'penerbangan_id' => 5,
                'tipe_kelas' => 1,
                'harga' => 740000,
                'jumlah_kursi' => 40,
                'seat_layout' => Storage::disk('local')->get('seatLayout/example.json'),
            ]
        ];
        foreach ($kelas_penerbangan as $d) {
            kelas_penerbangan::create($d);
        }
    }
}
