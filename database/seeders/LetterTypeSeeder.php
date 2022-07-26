<?php

namespace Database\Seeders;

use App\Models\LetterCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $letterCategory = LetterCategory::find(1);
        $letterCategory->letterTypes()->createMany([
            ['name' => 'Surat Keluar'],
            ['name' => 'Berita Acara'],
            ['name' => 'Surat Perjanjian'],
            ['name' => 'Surat Perintah Kerja'],
            ['name' => 'Surat Edaran'],
        ]);

        $letterCategory = LetterCategory::find(2);
        $letterCategory->letterTypes()->createMany([
            ['name' => 'Surat Kuasa'],
            ['name' => 'Surat Edaran'],
            ['name' => 'Surat Keluar'],
            ['name' => 'SK DIREKSI'],
        ]);

        $letterCategory = LetterCategory::find(3);
        $letterCategory->letterTypes()->createMany([
            ['name' => 'E-Memo'],
            ['name' => 'Notulen'],
        ]);
    }
}
