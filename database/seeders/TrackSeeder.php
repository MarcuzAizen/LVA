<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Track;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Factory::create();
        Track::factory()
            ->count(10)
            ->create()
            ->each(function ($track) use ($faker) {
                $track->sections();
            });
    }
}
