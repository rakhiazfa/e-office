<?php

namespace Database\Seeders;

use App\Models\JobLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobLevel = new JobLevel(['name' => 'Direktorat']);
        $jobLevel->role()->associate(2);
        $jobLevel->save();

        $jobLevel = new JobLevel(['name' => 'Divisi']);
        $jobLevel->role()->associate(3);
        $jobLevel->save();

        $jobLevel = new JobLevel(['name' => 'Departement']);
        $jobLevel->role()->associate(4);
        $jobLevel->save();

        $jobLevel = new JobLevel(['name' => 'Seksi']);
        $jobLevel->role()->associate(5);
        $jobLevel->save();

        $jobLevel = new JobLevel(['name' => 'Staff']);
        $jobLevel->role()->associate(6);
        $jobLevel->save();
    }
}
