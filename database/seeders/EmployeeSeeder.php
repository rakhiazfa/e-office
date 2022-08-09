<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\JobLevel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        $employee = new Employee([
            'nik' => '1208060704',
            'ktp' => '1607060704',
            'ktp_address' => 'Jl. Wastukencana No. 67/24B',
            'city' => 'Kota Bandung',
            'address' => 'Jl. Wastukencana No. 67/24B',
            'phone' => '089521580180',
            'place_of_birth' => 'Kota Bandung',
            'date_of_birth' => date('Y-m-d', strtotime('2004-07-06')),
            'gender' => 'Pria',
            'blood_group' => 'O',
            'religion' => 'Islam',
            'marital_status' => 'Belum Menikah',
        ]);

        $user = User::find(2);
        $job_level = JobLevel::find(1);
        $job = $job_level->jobs()->first();

        $employee->user()->associate($user);
        $employee->jobLevel()->associate($job_level);
        $employee->job()->associate($job);

        $employee->save();

        // 2
        $employee = new Employee([
            'nik' => '1305060704',
            'ktp' => '1801060704',
            'ktp_address' => 'Jl. Wastukencana No. 41/24B',
            'city' => 'Kota Bandung',
            'address' => 'Jl. Wastukencana No. 41/24B',
            'phone' => '082125580170',
            'place_of_birth' => 'Kota Bandung',
            'date_of_birth' => date('Y-m-d', strtotime('2004-07-06')),
            'gender' => 'Wanita',
            'blood_group' => 'O',
            'religion' => 'Islam',
            'marital_status' => 'Belum Menikah',
        ]);

        $user = User::find(3);
        $job_level = JobLevel::find(2);
        $job = $job_level->jobs()->first();
        $superior = Employee::find(1);

        $employee->user()->associate($user);
        $employee->jobLevel()->associate($job_level);
        $employee->job()->associate($job);
        $employee->superior()->associate($superior);

        $employee->save();

        // 3
        $employee = new Employee([
            'nik' => '1903170804',
            'ktp' => '1803170804',
            'ktp_address' => 'Jl. Margahayu No. 33/24C',
            'city' => 'Kota Bandung',
            'address' => 'Jl. Margahayu No. 33/24C',
            'phone' => '089211587180',
            'place_of_birth' => 'Kota Bandung',
            'date_of_birth' => date('Y-m-d', strtotime('2004-08-17')),
            'gender' => 'Pria',
            'blood_group' => 'O',
            'religion' => 'Islam',
            'marital_status' => 'Belum Menikah',
        ]);

        $user = User::find(4);
        $job_level = JobLevel::find(3);
        $job = $job_level->jobs()->first();
        $superior = Employee::find(2);

        $employee->user()->associate($user);
        $employee->jobLevel()->associate($job_level);
        $employee->job()->associate($job);
        $employee->superior()->associate($superior);

        $employee->save();
    }
}
