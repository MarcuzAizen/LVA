<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ScheduleService
{
    /**
     * Calculate the time conflicts of the subject and teacher
     * @param array $request
     * @return bool
     */
    public static function hasConflict(array $request)
    {
        $acad_year_id = $request['acad_year_id'];
        $section_id = $request['section_id'];
        $teacher_id = $request['teacher_id'];
        $prospectus_id = $request['prospectus_id'];
        $day = $request['day'];
        $time_start = $request['time_start'];
        $time_end = $request['time_end'];

        return ((new self)->hasSubjectInSection($acad_year_id, $section_id, $prospectus_id) ||
            (new self)->hasOccupiedTimeInSubject($acad_year_id, $time_start, $time_end, $prospectus_id) ||
            (new self)->hasOccupiedDayAndTimeForTeacher($acad_year_id, $teacher_id, $day, $time_start, $time_end)) ?
            true : false;
    }

    /**
     * Check if subject already assigned to section
     * @param int $acad_year_id
     * @param int $section_id
     * @param int $prospectus_id
     * @return bool
     */
    private function hasSubjectInSection(int $acad_year_id, int $section_id, int $prospectus_id)
    {
        return DB::table('schedules')
            ->where('acad_year_id', $acad_year_id)
            ->where('section_id', $section_id)
            ->where('prospectus_id', $prospectus_id)
            ->whereNull('deleted_at')
            ->distinct()
            ->exists();
    }

    /**
     * Check if time already occupied to subject
     * @param int $acad_year_id
     * @param string $time_start
     * @param string $time_end
     * @param int $prospectus_id
     * @return bool
     */
    private function hasOccupiedTimeInSubject(
        int $acad_year_id, 
        string $time_start, 
        string $time_end, 
        int $prospectus_id
    ) {
        return DB::table('schedules')
            ->where('acad_year_id', $acad_year_id)
            ->where('prospectus_id', $prospectus_id)
            ->whereBetween('time_start', [$time_start, $time_end])
            ->whereNull('deleted_at')
            ->exists();
    }

    /**
     * Check if day and time of the subject already occupied for teacher
     * @param int $acad_year_id
     * @param int $teacher_id
     * @param string $day
     * @param string $time_start
     * @param string $time_end
     * @return bool
     */
    private function hasOccupiedDayAndTimeForTeacher(
        int $acad_year_id, 
        int $teacher_id, 
        string $day, 
        string $time_start, 
        string $time_end
    ) {
        return DB::table('schedules')
            ->where('acad_year_id', $acad_year_id)
            ->where('teacher_id', $teacher_id)
            ->where('day', $day)
            ->whereBetween('time_start', [$time_start, $time_end])
            ->whereNull('deleted_at')
            ->exists();
    }
}