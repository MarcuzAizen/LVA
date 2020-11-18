<?php

namespace Database\Factories;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition()
    {
        return [
            'enroll_id' => rand(1, 4),
            'schedule_id' => rand(1, 4),
            'mark' => $this->faker->randomElement([rand(1, 4)]),
            'quarter_sem' => $this->faker->randomElement([rand(1, 4)]),
        ];
    }
}
