<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role_id' => 1,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName,
            'sex' => $this->faker->randomElement(['M', 'F']),
            'birthdate' => $this->faker->date(),
            'contact_number' => '0'.rand(9000000000, 9999999999),
            'specialization' => '',
            'citizenship' => 'Filipino',
            'religion' => ucfirst($this->faker->word()),
            'purok' => $this->faker->word,
            'barangay' => $this->faker->word,
            'city' => $this->faker->word,
            'province' => $this->faker->word,
            'username' => 'admin',
            'password' => 'password',
            'remember_token' => Str::random(10)
        ];
    }
}
