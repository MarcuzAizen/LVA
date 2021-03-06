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
            'enroll_id' => rand(1, 10),
            'schedule_id' => rand(1, 10),
            'mark' => rand(70, 99),
            'quarter_sem' => $this->faker->randomElement([rand(1, 4)]),
        ];
    }
}
