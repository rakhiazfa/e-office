<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        $user->assignRole('admin');

        // 2
        $user = User::create([
            'name' => 'Rakhi Azfa Rifansya',
            'email' => 'rakhiazfa0421@gmail.com',
            'password' => Hash::make('rakhiazfa0421'),
        ]);

        $user->assignRole('director');

        // 3
        $user = User::create([
            'name' => 'Chyntia Adela',
            'email' => 'chyntia.adela@gmail.com',
            'password' => Hash::make('chyntia.adela'),
        ]);

        $user->assignRole('director');

        // 4
        $user = User::create([
            'name' => 'Fauzan Achmad',
            'email' => 'fauzan.achmad@gmail.com',
            'password' => Hash::make('fauzan.achmad'),
        ]);

        $user->assignRole('division');
    }
}
