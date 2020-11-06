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
            'registrar_id' => 2,
            'student_id' => rand(1, 10),
            'acad_year_id' => rand(1, 10),
            'section_id' => rand(1, 10)
        ];
    }
}
