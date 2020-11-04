<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->ean8(),
            'description' => $this->faker->sentence,
            'unit' => $this->faker->randomDigit(),
        ];
    }
}
