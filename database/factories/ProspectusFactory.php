<?php

namespace Database\Factories;

use App\Models\Prospectus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProspectusFactory extends Factory
{
    protected $model = Prospectus::class;

    public function definition()
    {
        return [
            'track_id' => rand(1, 4),
            'subject_id' => rand(1, 4),
            'sem_to_offer' => $this->faker->randomDigit(),
        ];
    }
}
