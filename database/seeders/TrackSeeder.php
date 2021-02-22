<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    public function run()
    { 
        Track::factory()->create([
            'name' => 'JHS',
            'description' => 'Junior High School',
            'grade_level' => '7'
        ]);

        Track::factory()->create([
            'name' => 'JHS',
            'description' => 'Junior High School',
            'grade_level' => '8'
        ]);

        Track::factory()->create([
            'name' => 'JHS',
            'description' => 'Junior High School',
            'grade_level' => '9'
        ]);

        Track::factory()->create([
            'name' => 'JHS',
            'description' => 'Junior High School',
            'grade_level' => '10'
        ]);
        
        Track::factory()->create([
            'name' => 'GAS',
            'description' => 'General Academic Strand',
            'grade_level' => 11
        ]);

        Track::factory()->create([
            'name' => 'GAS',
            'description' => 'General Academic Strand',
            'grade_level' => 12
        ]);
    }
}
