<?php

namespace Database\Factories;

use App\Models\AcadYear;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcadYearFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AcadYear::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $year = $this->faker->date();
        return [
            'start' => $year,
            'end' => $year + 1
        ];
    }
}
