<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CompanySeeder::class,
            RoleSeeder::class,
            JobLevelSeeder::class,
            JobSeeder::class,
            LetterCategorySeeder::class,
            LetterTypeSeeder::class,
            UserSeeder::class,
            EmployeeSeeder::class,
            MeetingSeeder::class,
        ]);
    }
}
