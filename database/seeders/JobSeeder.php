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
            ['name' => 'Div. Marketing & Business Solution', 'job_id' => 1],
            ['name' => 'Div. Project Development', 'job_id' => 1],
            ['name' => 'Div. Technical & Regional Planning', 'job_id' => 1],

            ['name' => 'Div. Corp Sec, Legal and Communication', 'job_id' => 2],
            ['name' => 'Div. Corporate Planning', 'job_id' => 2],
            ['name' => 'Div. Corporate Transformation Office', 'job_id' => 2],
            ['name' => 'Div. Internal Audit', 'job_id' => 2],

            ['name' => 'Div. Comisaris', 'job_id' => 3],

            ['name' => 'Div. Accounting & Tax', 'job_id' => 4],
            ['name' => 'Div. Finance & Treasury', 'job_id' => 4],
            ['name' => 'Div. General Affairs, IT & Office Procurement', 'job_id' => 4],
            ['name' => 'Div. Risk Management & Compliance', 'job_id' => 4],

            ['name' => 'Div. Asset Optimalization', 'job_id' => 5],
            ['name' => 'Div. Commercial & Business', 'job_id' => 5],
            ['name' => 'Div. Engineering', 'job_id' => 5],
        ]);

        $jobLevel = JobLevel::find(3);
        $jobLevel->jobs()->createMany([
            ['name' => 'Dept. Asset Optimization and Administration', 'job_id' => 6],
            ['name' => 'Dept. Asset Protection', 'job_id' => 6],

            ['name' => 'Dept. Business Solution', 'job_id' => 7],
            ['name' => 'Dept. Marketing', 'job_id' => 7],

            ['name' => 'Dept. Project Director 1', 'job_id' => 8],
            ['name' => 'Dept. Project Director 2', 'job_id' => 8],
            ['name' => 'Dept. Project Director 3', 'job_id' => 8],

            ['name' => 'Dept. Quantity Engineer', 'job_id' => 9],
            ['name' => 'Dept. Regional Planning', 'job_id' => 9],
            ['name' => 'Dept. Technical Planning    ', 'job_id' => 9],

            ['name' => 'Dept. Corporate Affairs', 'job_id' => 10],
            ['name' => 'Dept. Corporate Communication', 'job_id' => 10],
            ['name' => 'Dept. Legal', 'job_id' => 10],
            ['name' => 'Dept. Licence & Permit', 'job_id' => 10],

            ['name' => 'Dept. Business Performance', 'job_id' => 11],
            ['name' => 'Dept. Strategic Business Plan', 'job_id' => 11],
            ['name' => 'Dept. Strategic Investasi & Patnership', 'job_id' => 11],
            ['name' => 'Dept. Subsidiary Management', 'job_id' => 11],

            ['name' => 'Dept. HC Administration', 'job_id' => 12],
            ['name' => 'Dept. People Development', 'job_id' => 12],
            ['name' => 'Dept. Planning, Recruitment & Career', 'job_id' => 12],

            ['name' => 'Dept. Monitoring, Evaluation and Administration', 'job_id' => 13],
            ['name' => 'Dept. Pool of Auditor', 'job_id' => 13],

            ['name' => 'Dept. Comisaris', 'job_id' => 14],

            ['name' => 'Dept. Financial Accounting', 'job_id' => 15],
            ['name' => 'Dept. Tax', 'job_id' => 15],

            ['name' => 'Dept. Cash Management', 'job_id' => 16],
            ['name' => 'Dept. Corporate Finance', 'job_id' => 16],

            ['name' => 'Dept. General Affairs', 'job_id' => 17],
            ['name' => 'Dept. IT System', 'job_id' => 17],
            ['name' => 'Dept. Office Procurement', 'job_id' => 17],

            ['name' => 'Dept. Compliance & Business Process', 'job_id' => 18],
            ['name' => 'Dept. Risk Management', 'job_id' => 18],

            ['name' => 'Dept. Building Management', 'job_id' => 19],
            ['name' => 'Dept. Facility Management', 'job_id' => 19],
            ['name' => 'Dept. Land Patnership', 'job_id' => 19],

            ['name' => 'Dept. JIEPP Business Unit', 'job_id' => 20],
            ['name' => 'Dept. Maintenance Engineering & K3L', 'job_id' => 20],
            ['name' => 'Dept. POP Business Unit', 'job_id' => 20],
            ['name' => 'Dept. Sales & Marketing', 'job_id' => 20],

            ['name' => 'Dept. Administration Contract', 'job_id' => 21],
            ['name' => 'Dept. Architech & Engineering', 'job_id' => 21],
            ['name' => 'Dept. Cost Control', 'job_id' => 21],
            ['name' => 'Dept. Document Control', 'job_id' => 21],
        ]);

        $jobLevel = JobLevel::find(4);
        $jobLevel->jobs()->createMany([
            ['name' => 'Sec. Asset Optimization and Administration', 'job_id' => 22],
            ['name' => 'Sec. Asset Protection', 'job_id' => 23],

            ['name' => 'Sec. Business Solution', 'job_id' => 24],
            ['name' => 'Sec. Marketing', 'job_id' => 25],

            ['name' => 'Sec. Project Direction 1', 'job_id' => 26],
            ['name' => 'Sec. Project Direction 2', 'job_id' => 27],
            ['name' => 'Sec. Project Direction 3', 'job_id' => 28],

            ['name' => 'Sec. Quantity Engineer', 'job_id' => 29],
            ['name' => 'Sec. Regional Planning', 'job_id' => 30],
            ['name' => 'Sec. Technical Planning', 'job_id' => 31],

            ['name' => 'Sec. Corporate Affairs', 'job_id' => 32],
            ['name' => 'Sec. Corporate Affairs ( Secretary Board of Director )', 'job_id' => 32],

            ['name' => 'Sec. Corporate Communication', 'job_id' => 33],
            ['name' => 'Sec. Legal', 'job_id' => 34],
            ['name' => 'Sec. License Permit', 'job_id' => 35],

            ['name' => 'Sec. Business Performance', 'job_id' => 36],
            ['name' => 'Sec. Strategic Business Plan', 'job_id' => 37],
            ['name' => 'Sec. Strategic Investasi & Patnership', 'job_id' => 38],
            ['name' => 'Sec. Subsidiary Management', 'job_id' => 39],

            ['name' => 'Sec. HC Administration', 'job_id' => 40],
            ['name' => 'Sec. People Development & Assesment Center', 'job_id' => 41],
            ['name' => 'Sec. Planning, Recruitment & Career', 'job_id' => 42],

            ['name' => 'Sec. Monotoring, Evaluation and Administration', 'job_id' => 43],
            ['name' => 'Sec. Pool Auditor', 'job_id' => 44],

            ['name' => 'Sec. Comisaris', 'job_id' => 45],

            ['name' => 'Sec. Financial Accounting', 'job_id' => 46],
            ['name' => 'Sec. Tax', 'job_id' => 47],

            ['name' => 'Sec. Cash Management', 'job_id' => 48],
            ['name' => 'Sec. Corporate Finance', 'job_id' => 49],

            ['name' => 'Sec. General Affairs', 'job_id' => 50],
            ['name' => 'Sec. IT System', 'job_id' => 51],
            ['name' => 'Sec. Office Procurement', 'job_id' => 52],

            ['name' => 'Sec. Compliance & Business Process', 'job_id' => 53],
            ['name' => 'Sec. Risk Management', 'job_id' => 54],

            ['name' => 'Sec. Building Management', 'job_id' => 55],
            ['name' => 'Sec. Facility Management', 'job_id' => 56],
            ['name' => 'Sec. Land Patnership', 'job_id' => 57],

            ['name' => 'Sec. Finance JIEPP Business Unit', 'job_id' => 58],
            ['name' => 'Sec. JIEPP Business', 'job_id' => 58],

            ['name' => 'Sec. Maintenance Engineering & K3L', 'job_id' => 59],

            ['name' => 'Sec. Finance POP Business Unit', 'job_id' => 60],
            ['name' => 'Sec. POP Business Unit', 'job_id' => 60],

            ['name' => 'Sec. Sales & Marketing', 'job_id' => 61],

            ['name' => 'Sec. Administration Contract', 'job_id' => 62],
            ['name' => 'Sec. Arcitech & Engineering', 'job_id' => 63],
            ['name' => 'Sec. Cost Control', 'job_id' => 64],
            ['name' => 'Sec. Document Control', 'job_id' => 65],
        ]);
    }
}
