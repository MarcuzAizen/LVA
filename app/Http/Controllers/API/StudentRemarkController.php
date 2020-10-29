<?php

namespace App\Http\Controllers\API;

use App\Models\StudentRemark;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentRemarkResource;
use App\Http\Requests\StoreStudentRemarkRequest;
use App\Http\Requests\UpdateStudentRemarkRequest;

class StudentRemarkController extends Controller
{
    public function index()
    {
        $studentRemarks = StudentRemark::latest()->paginate(10);
        return StudentRemarkResource::collection($studentRemarks);
    }

    public function store(StoreStudentRemarkRequest $request)
    {
        StudentRemark::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'StudentRemark successfully created!'
        ], 201);
    }

    public function show(StudentRemark $studentRemark)
    {
        return new StudentRemarkResource($studentRemark);
    }

    public function update(UpdateStudentRemarkRequest $request, StudentRemark $studentRemark)
    {
        $studentRemark->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'StudentRemark successfully updated!'
        ]);
    }

    public function destroy(StudentRemark $studentRemark)
    {
        if ($studentRemark->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'StudentRemark successfully deleted!'
            ]);
        }
    }
}
