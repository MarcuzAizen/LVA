<?php

namespace Database\Seeders;

use App\Models\Enroll;
use Illuminate\Database\Seeder;

class EnrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enroll::factory()->count(10)->create();
    }
}
