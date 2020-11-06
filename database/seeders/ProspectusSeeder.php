<?php

namespace Database\Seeders;

use App\Models\Prospectus;
use Illuminate\Database\Seeder;

class ProspectusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prospectus::factory()->count(10)->create();
    }
}
