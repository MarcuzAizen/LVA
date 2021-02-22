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
            'track_id' => rand(1, 6),
            'subject_id' => rand(1, 49),
            'sem_to_offer' => $this->faker->randomElement([null, rand(1, 2)]),
        ];
    }
}
