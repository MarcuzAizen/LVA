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
        ]);

        Track::factory()->create([
            'name' => 'GAS',
        ]);

        Track::factory()->create([
            'name' => 'STEM',
        ]);
    }
}
