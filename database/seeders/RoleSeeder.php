<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'director']);
        Role::create(['name' => 'division']);
        Role::create(['name' => 'department']);
        Role::create(['name' => 'sexy']);
        Role::create(['name' => 'staff']);
    }
}
