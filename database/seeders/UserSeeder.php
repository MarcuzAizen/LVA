<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        User::factory()->create([
            'role_id' => 2,
            'username' => 'registrar',
        ]);
        User::factory()->create([
            'role_id' => 3,
            'username' => 'enrollment.officer',
        ]);
        User::factory()->create([
            'role_id' => 4,
            'username' => 'principal',
        ]);
        User::factory()->create([
            'role_id' => 5,
            'username' => 'teacher',
        ]);
    }
}
