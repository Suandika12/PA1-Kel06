<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 15; $i++) { 
            Jadwal::create([
                'tanggal' => '2021-01-01',
                'lokasi' => 'jakarta',
                'nama_petugas' => 'Andi',
                'tugas' => 'Membersihkan wc ' .  $i,
            ]);
        }
    }
}
