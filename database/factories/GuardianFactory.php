<?php

namespace Database\Factories;

use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuardianFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guardian::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName,
            'suffix' => $this->faker->randomElement([null, $this->faker->suffix]),
            'sex' => $this->faker->randomElement(['M', 'F']),
            'birthdate' => $this->faker->date(),
            'contact_number' => '0'.rand(9000000000, 9999999999),
            'religion' => ucfirst($this->faker->word()),
            'occupation' => $this->faker->jobTitle
        ];
    }
}
