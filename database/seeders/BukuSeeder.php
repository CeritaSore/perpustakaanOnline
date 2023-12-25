<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Buku::create([
            'Judul_buku'=>'Fly me to the moon',
            'pengarang_id'=>'1',
            'penerbit_id'=>'1',
            'kategori_id'=>'1',
            'tahun_terbit'=>'2020',
            
        ]);
    }
}
