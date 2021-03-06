<?php

namespace App\Http\Controllers\API;

use App\Models\Track;
use App\Models\Schedule;
use App\Services\ScheduleService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleResource;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['acadYear', 'teacher', 'section', 'prospectus.subject'])
            ->latest()->paginate(10);
        return ScheduleResource::collection($schedules);
    }

    public function store(StoreScheduleRequest $request)
    {
        if (ScheduleService::hasConflict($request->validated())) {
            abort(422, 'Schedule conflict in subject, time and/or day');
        }

        Schedule::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Schedule successfully created!'
        ], 201);
    }

    public function show(Schedule $schedule)
    {
        return new ScheduleResource($schedule->load(['acadYear', 'teacher', 'section', 'prospectus.subject']));
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        if (ScheduleService::hasConflict($request->validated())) {
            abort(422, 'Schedule conflict in subject, time and/or day');
        }

        $schedule->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Schedule successfully updated!'
        ]);
    }

    public function destroy(Schedule $schedule)
    {
        if ($schedule->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Schedule successfully deleted!'
            ]);
        }
    }
    
    public function getJuniorHighSched(int $gradeLevel = 7)
    {
        $schedules = Track::with([
            'sections.schedules.acadYear',
            'sections.schedules.teacher',
            'sections.schedules.prospectus.subject',
        ])
        ->where('name', 'JHS')
        ->where('grade_level', $gradeLevel)
        ->latest()
        ->first();

        return new ScheduleResource($schedules);
    }
    
    public function getSeniorHighSched(int $gradeLevel = 11)
    {
        $schedules = Track::with([
            'sections.schedules.acadYear',
            'sections.schedules.teacher',
            'sections.schedules.prospectus.subject',
        ])
        ->where('name', '!=', 'JHS')
        ->where('grade_level', $gradeLevel)
        ->latest()
        ->get();

        return ScheduleResource::collection($schedules);
    }
}
