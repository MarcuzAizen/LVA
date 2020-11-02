<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Student::factory()
            ->count(10)
            ->create()
            ->each(function ($student) use ($faker) {
                $student->guardians()->sync([
                    rand(1, 10) => ['relationship' => $faker->word()]
                ]);
            });
    }
}
