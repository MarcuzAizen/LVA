<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TeacherSeeder::class,
            StudentRemarkSeeder::class,
            GuardianSeeder::class,
            StudentSeeder::class,
            AcadYearSeeder::class,
            SubjectSeeder::class,
            TrackSeeder::class,
            SectionSeeder::class,
            ProspectusSeeder::class,
            EnrollSeeder::class,
            ScheduleSeeder::class,
            GradeSeeder::class,
            AttendanceSeeder::class,
        ]);
    }
}