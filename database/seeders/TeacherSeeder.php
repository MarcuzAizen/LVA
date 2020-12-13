<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        User::factory()->count(10)->create([
            'role_id' => 5,
            'specialization' => $faker->jobTitle,
            'username' => $faker->unique()->userName
        ]);
    }
}
