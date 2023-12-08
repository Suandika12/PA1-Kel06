<?php

namespace Database\Seeders;

use App\Models\LaporPertamanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 12; $i++) { 
            LaporPertamanan::create([
                'id_user' => '1',
                'judul' => 'Judul ' . $i,
                'Isi_Keluhan' => 'Isi ' . $i,
                'Choose_File' => 'null' . $i,
            ]);
        }
    }
}
