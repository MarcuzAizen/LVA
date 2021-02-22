<?php

namespace Database\Factories;

use App\Models\Enroll;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enroll::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'enrollment_officer_id' => 3,
            'student_id' => rand(1, 10),
            'acad_year_id' => 1,
            'section_id' => rand(1, 12)
        ];
    }
}
