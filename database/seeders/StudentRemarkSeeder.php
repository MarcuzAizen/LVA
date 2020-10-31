<?php

namespace Database\Seeders;

use App\Models\StudentRemark;
use Illuminate\Database\Seeder;

class StudentRemarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentRemark::factory()->create([
            'code' => 'T/O',
            'indicator' => 'Transferred OUT'
        ]);
        StudentRemark::factory()->create([
            'code' => 'T/I',
            'indicator' => 'Transferred IN'
        ]);
        StudentRemark::factory()->create([
            'code' => 'DRP',
            'indicator' => 'Dropped'
        ]);
        StudentRemark::factory()->create([
            'code' => 'LE',
            'indicator' => 'Late Enrollment'
        ]);
    }
}
