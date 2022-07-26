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
        $user = User::create([
            'name' => 'Asep Surmana',
            'email' => 'asepsurmana@gmail.com',
            'password' => Hash::make('asepsurmana'),
        ]);

        $user->assignRole('admin');

        User::create([
            'name' => 'Fauzan Achmad',
            'email' => 'fauzan.achmad@gmail.com',
            'password' => Hash::make('fauzan.achmad'),
        ]);

        User::create([
            'name' => 'Rakhi Azfa Rifansya',
            'email' => 'rakhiazfa0421@gmail.com',
            'password' => Hash::make('rakhiazfa0421'),
        ]);

        User::create([
            'name' => 'Reyhan Maulana',
            'email' => 'reyhan.maulana@gmail.com',
            'password' => Hash::make('reyhan.maulana'),
        ]);

        User::create([
            'name' => 'Ardhito Pramono',
            'email' => 'ardhitopramono@gmail.com',
            'password' => Hash::make('ardhitopramono'),
        ]);

        User::create([
            'name' => 'Gilang Saputra',
            'email' => 'gilang.saputra@gmail.com',
            'password' => Hash::make('gilang.saputra'),
        ]);

        User::create([
            'name' => 'Lukman Kurniawan',
            'email' => 'lukmankurnia01@gmail.com',
            'password' => Hash::make('lukmankurnia01'),
        ]);

        User::create([
            'name' => 'Adjie Tugu Marwanto',
            'email' => 'adjie.marwanto@gmail.com',
            'password' => Hash::make('adjie.marwanto'),
        ]);

        User::create([
            'name' => 'Hesti Kuniasari',
            'email' => 'hesti.kurnia@gmail.com',
            'password' => Hash::make('hesti.kurnia'),
        ]);

        User::create([
            'name' => 'Lina Diawati',
            'email' => 'lina.diawati@gmail.com',
            'password' => Hash::make('lina.diawati'),
        ]);
    }
}
