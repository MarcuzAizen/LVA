<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    protected $model = Section::class;

    public function definition()
    {
        return [
            'track_id' => $this->faker->randomElement([null, rand(1, 4)]),
            'name' => $this->faker->name,
            'capacity' => $this->faker->randomDigit(),
        ];
    }
}
