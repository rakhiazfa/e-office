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
        $jobLevel1 = new JobLevel(['name' => 'Direktorat']);
        $jobLevel1->role()->associate(2);
        $jobLevel1->save();

        $jobLevel2 = new JobLevel(['name' => 'Divisi']);
        $jobLevel2->role()->associate(3);
        $jobLevel2->parent()->associate($jobLevel1);
        $jobLevel2->save();

        $jobLevel3 = new JobLevel(['name' => 'Departement']);
        $jobLevel3->role()->associate(4);
        $jobLevel3->parent()->associate($jobLevel2);
        $jobLevel3->save();

        $jobLevel4 = new JobLevel(['name' => 'Seksi']);
        $jobLevel4->role()->associate(5);
        $jobLevel4->parent()->associate($jobLevel3);
        $jobLevel4->save();

        $jobLevel5 = new JobLevel(['name' => 'Staff']);
        $jobLevel5->role()->associate(6);
        $jobLevel5->parent()->associate($jobLevel4);
        $jobLevel5->save();
    }
}
