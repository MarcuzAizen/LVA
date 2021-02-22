<?php

namespace Database\Factories;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'acad_year_id' => 1,
            'teacher_id' => 5,
            'section_id' => rand(1, 12),
            'prospectus_id' => rand(1, 10),
            'day' => $this->faker->randomElement(['M', 'T', 'W', 'H', 'F']),
            'time_start' => $this->faker->time(),
            'time_end' => $this->faker->time()
        ];
    }
}
