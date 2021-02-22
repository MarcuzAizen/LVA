<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run()
    {
        for($i = 1; $i <= 6; $i++) {
            Section::factory()->count(2)->create([
                'track_id' => $i
            ]);
        }
    }
}
