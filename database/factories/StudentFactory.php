<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lrn' => rand(000000000001, 999999999999),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->randomElement([null, $this->faker->lastName]),
            'last_name' => $this->faker->lastName,
            'suffix' => $this->faker->randomElement([null, $this->faker->suffix]),
            'sex' => $this->faker->randomElement(['M', 'F']),
            'birthdate' => $this->faker->date(),
            'mother_tongue' => ucfirst($this->faker->word()),
            'contact_number' => '0'.rand(9000000000, 9999999999),
            'previous_school' => $this->faker->company,
            'ethnic' => ucfirst($this->faker->word()),
            'religion' => ucfirst($this->faker->word()),
            'purok' => $this->faker->buildingNumber,
            'barangay' => $this->faker->streetName,
            'city' => $this->faker->city,
            'province' => $this->faker->state,
            'username' => $this->faker->unique()->userName,
            'password' => 'password',
            'remember_token' => Str::random(10)
        ];
    }
}
