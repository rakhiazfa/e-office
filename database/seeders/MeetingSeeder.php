<?php

namespace Database\Seeders;

use App\Models\Meeting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meeting = Meeting::create([
            'meeting_agenda' => 'Pelatihan QRMO',
            'meeting_room' => 'Ruang Meeting 1',
            'meeting_date' => fake()->date(),
        ]);


        $meeting = Meeting::create([
            'meeting_agenda' => 'Project Development',
            'meeting_room' => 'Ruang Meeting 2',
            'meeting_date' => fake()->date(),
        ]);

        $meeting = Meeting::create([
            'meeting_agenda' => 'Psikotest',
            'meeting_room' => 'Ruang Meeting 3',
            'meeting_date' => fake()->date(),
        ]);
    }
}
