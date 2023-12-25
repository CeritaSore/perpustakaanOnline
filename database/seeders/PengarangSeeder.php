<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Pengarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pengarang::create([
            'nama_pengarang'=>'Hata Kenjiro',
        ]);
    }
}
