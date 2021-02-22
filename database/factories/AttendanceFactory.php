<?php

namespace Database\Factories;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition()
    {
        return [
            'schedule_id' => rand(1, 10),
            'remarks' => $this->faker->randomElement(['present', 'late', 'absent']),
        ];
    }
}
