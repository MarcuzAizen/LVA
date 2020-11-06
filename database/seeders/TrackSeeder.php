<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    public function run()
    { 
        Track::factory()->create();
        Track::factory()->create([
            'name' => 'HUMMS',
            'grade_level' => '12'
        ]);

        Track::factory()->create([
            'name' => 'GAS',
            'grade_level' => '10'
        ]);

        Track::factory()->create([
            'name' => 'STEM',
            'grade_level' => '7'
        ]);
    }
}
