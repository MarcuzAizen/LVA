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
            'track_id' => rand(1, 4),
            'name' => ucfirst($this->faker->word),
            'capacity' => rand(45, 50),
        ];
    }
}
