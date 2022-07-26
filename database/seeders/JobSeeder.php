<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobLevel = JobLevel::find(1);
        $jobLevel->jobs()->createMany([
            ['name' => 'Business Development Directorate'],
            ['name' => 'CEO Office Directorate'],
            ['name' => 'Comisaris'],
            ['name' => 'Finance & Risk Management Directorate'],
            ['name' => 'Opration Directorate']
        ]);

        $jobLevel = JobLevel::find(2);
        $jobLevel->jobs()->createMany([
            ['name' => 'Div. Asset Management', 'job_id' => 1],

            ['name' => 'Div. Corp Sec, Legal and Communication', 'job_id' => 2],

            ['name' => 'Div. Comisaris', 'job_id' => 3],

            ['name' => 'Div. Accounting & Tax', 'job_id' => 4],

            ['name' => 'Div. Asset Optimalization', 'job_id' => 5],
        ]);

        $jobLevel = JobLevel::find(3);
        $jobLevel->jobs()->createMany([
            ['name' => 'Dept. Asset Optimization', 'job_id' => 6],

            ['name' => 'Dept. Legal', 'job_id' => 7],

            ['name' => 'Dept. Comisaris', 'job_id' => 8],

            ['name' => 'Dept. Financial Accounting', 'job_id' => 9],

            ['name' => 'Dept. Building Management', 'job_id' => 10],
        ]);

        $jobLevel = JobLevel::find(4);
        $jobLevel->jobs()->createMany([
            ['name' => 'Sec. Asset Optimization and Administration', 'job_id' => 11],

            ['name' => 'Sec. Legal', 'job_id' => 12],

            ['name' => 'Sec. Comisaris', 'job_id' => 13],

            ['name' => 'Sec. Financial Accounting', 'job_id' => 14],

            ['name' => 'Sec. Building Management', 'job_id' => 15],
        ]);

        $jobLevel = JobLevel::find(5);
        $jobLevel->jobs()->createMany([
            ['name' => 'Staff. Asset Optimization and Administration', 'job_id' => 16],

            ['name' => 'Staff. Legal', 'job_id' => 17],

            ['name' => 'Staff. Comisaris', 'job_id' => 18],

            ['name' => 'Staff. Financial Accounting', 'job_id' => 19],

            ['name' => 'Staff. Building Management', 'job_id' => 20],
        ]);
    }
}
