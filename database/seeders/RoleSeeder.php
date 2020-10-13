<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create();
        Role::factory()->create([
            'name' => 'registrar'
        ]);
        Role::factory()->create([
            'name' => 'enrollment officer'
        ]);
        Role::factory()->create([
            'name' => 'principal'
        ]);
        Role::factory()->create([
            'name' => 'teacher'
        ]);
    }
}
