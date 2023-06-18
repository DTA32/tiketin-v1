<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\bandara;

class BandaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_bandara' => 'Bandara Internasional Soekarno-Hatta',
                'kode_bandara' => 'CGK',
                'kota' => 'Jakarta',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Ngurah Rai',
                'kode_bandara' => 'DPS',
                'kota' => 'Denpasar',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Juanda',
                'kode_bandara' => 'SUB',
                'kota' => 'Surabaya',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Kualanamu',
                'kode_bandara' => 'KNO',
                'kota' => 'Medan',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Sultan Hasanuddin',
                'kode_bandara' => 'UPG',
                'kota' => 'Makassar',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Sultan Aji Muhammad Sulaiman',
                'kode_bandara' => 'BPN',
                'kota' => 'Balikpapan',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Sultan Mahmud Badaruddin II',
                'kode_bandara' => 'PLM',
                'kota' => 'Palembang',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Husein Sastranegara',
                'kode_bandara' => 'BDO',
                'kota' => 'Bandung',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Adisutjipto',
                'kode_bandara' => 'JOG',
                'kota' => 'Yogyakarta',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Minangkabau',
                'kode_bandara' => 'PDG',
                'kota' => 'Padang',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Sam Ratulangi',
                'kode_bandara' => 'MDC',
                'kota' => 'Manado',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Sultan Iskandar Muda',
                'kode_bandara' => 'BTJ',
                'kota' => 'Banda Aceh',
            ],
            [
                'nama_bandara' => 'Bandara Internasional El Tari',
                'kode_bandara' => 'KOE',
                'kota' => 'Kupang',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Lombok',
                'kode_bandara' => 'LOP',
                'kota' => 'Lombok',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Sultan Syarif Kasim II',
                'kode_bandara' => 'PKU',
                'kota' => 'Pekanbaru',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Supadio',
                'kode_bandara' => 'PNK',
                'kota' => 'Pontianak',
            ],
            [
                'nama_bandara' => 'Bandara Internasional Sultan Thaha',
                'kode_bandara' => 'DJB',
                'kota' => 'Jambi',
            ]
        ];
        foreach ($data as $d) {
            bandara::create($d);
        }
    }
}
