<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AcadYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcadYear::factory()->count(10)->create();
    }
}
