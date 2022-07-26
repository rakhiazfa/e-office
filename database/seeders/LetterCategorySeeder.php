<?php

namespace Database\Seeders;

use App\Models\LetterCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LetterCategory::create(['name' => 'Surat Masuk']);

        LetterCategory::create(['name' => 'Surat Keluar']);

        LetterCategory::create(['name' => 'E-Memo']);

        LetterCategory::create(['name' => 'Notulen']);

        LetterCategory::create(['name' => 'Disposisi']);
    }
}
