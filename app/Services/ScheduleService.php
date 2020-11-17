<?php

namespace App\Services;

use App\Models\Schedule;

class ScheduleService
{
    /**
     * Calculate the time conflicts of the subject and teacher
     * @param array $request
     * @return \Illuminate\Http\JsonResponse|false
     */
    public static function hasConflict(array $request)
    {
        if ((new self)->hasSubjectInSection(
            $request['acad_year_id'], 
            $request['section_id'], 
            $request['prospectus_id']
        )) {
            return response()->json([
                'success' => false,
                'message' => 'Subject already assigned to section'
            ], 422);
        }

        if ((new self)->hasOccupiedTimeInSubject(
            $request['acad_year_id'], 
            $request['time_start'], 
            $request['time_end'], 
            $request['prospectus_id']
        )) {
            return response()->json([
                'success' => false,
                'message' => 'Time already occupied to the subject'
            ], 422);
        }

        if ((new self)->hasOccupiedDayAndTimeForTeacher(
            $request['acad_year_id'], 
            $request['teacher_id'], 
            $request['day'], 
            $request['time_start'], 
            $request['time_end']
        )) {
            return response()->json([
                'success' => false,
                'message' => 'Day & time of the subject already occupied for teacher'
            ], 422);
        }

        return false;
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
        return Schedule::where([
            ['acad_year_id', '=', $acad_year_id],
            ['section_id', '=', $section_id],
            ['prospectus_id', '=', $prospectus_id]
        ])->distinct()->exists();
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
        return Schedule::where([
            ['acad_year_id', $acad_year_id],
            ['prospectus_id', $prospectus_id],
            ['time_start', '>=', $time_start],
            ['time_end', '<=', $time_end]
        ])->exists();
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
        return Schedule::where([
            ['acad_year_id', $acad_year_id],
            ['teacher_id', $teacher_id],
            ['day', $day],
            ['time_start', '>=', $time_start],
            ['time_end', '<=', $time_end]
        ])->exists();
    }
}