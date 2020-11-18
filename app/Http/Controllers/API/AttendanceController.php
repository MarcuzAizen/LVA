<?php

namespace App\Http\Controllers\API;

use App\Models\Attendance;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttendanceResource;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['schedule'])->latest()->paginate(10);
        return AttendanceResource::collection($attendances);
    }

    public function store(StoreAttendanceRequest $request)
    {
        Attendance::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Attendance successfully created!'
        ], 201);
    }

    public function show(Attendance $attendance)
    {
        return new AttendanceResource($attendance->load(['schedule']));
    }

    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $attendance->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Attendance successfully updated!'
        ]);
    }

    public function destroy(Attendance $attendance)
    {
        if ($attendance->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Attendance successfully deleted!'
            ]);
        }
    }
}