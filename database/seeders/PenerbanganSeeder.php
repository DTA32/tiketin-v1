<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\penerbangan;

class PenerbanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penerbangan = [
            [
                'bandara_asal_id' => 1,
                'bandara_tujuan_id' => 2,
                'waktu_berangkat' => '2023-06-19 08:00:00',
                'waktu_sampai' => '2023-06-19 10:00:00',
                'maskapai' => 'Garuda Indonesia',
                'tipe_pesawat' => 'A320',
            ],
            [
                'bandara_asal_id' => 2,
                'bandara_tujuan_id' => 1,
                'waktu_berangkat' => '2023-06-19 13:00:00',
                'waktu_sampai' => '2023-06-19 15:00:00',
                'maskapai' => 'Garuda Indonesia',
                'tipe_pesawat' => 'A320',
            ],
            [
                'bandara_asal_id' => 1,
                'bandara_tujuan_id' => 3,
                'waktu_berangkat' => '2023-06-19 08:00:00',
                'waktu_sampai' => '2023-06-19 10:00:00',
                'maskapai' => 'Garuda Indonesia',
                'tipe_pesawat' => 'Boeing 737',
            ],
            [
                'bandara_asal_id' => 1,
                'bandara_tujuan_id' => 3,
                'waktu_berangkat' => '2023-06-19 10:00:00',
                'waktu_sampai' => '2023-06-19 12:00:00',
                'maskapai' => 'Air Asia',
                'tipe_pesawat' => 'Airbus A320',
            ],
            [
                'bandara_asal_id' => 1,
                'bandara_tujuan_id' => 3,
                'waktu_berangkat' => '2023-06-19 12:00:00',
                'waktu_sampai' => '2023-06-19 14:00:00',
                'maskapai' => 'Lion Air',
                'tipe_pesawat' => 'Sukhoi Superjet 100',
            ],
            [
                'bandara_asal_id' => 3,
                'bandara_tujuan_id' => 1,
                'waktu_berangkat' => '2023-06-19 14:00:00',
                'waktu_sampai' => '2023-06-19 16:00:00',
                'maskapai' => 'Garuda Indonesia',
                'tipe_pesawat' => 'Boeing 737',
            ],
            [
                'bandara_asal_id' => 3,
                'bandara_tujuan_id' => 1,
                'waktu_berangkat' => '2023-06-19 16:00:00',
                'waktu_sampai' => '2023-06-19 18:00:00',
                'maskapai' => 'Garuda Indonesia',
                'tipe_pesawat' => 'Boeing 737',
            ]
        ];
        foreach ($penerbangan as $d) {
            penerbangan::create($d);
        }
    }
}
