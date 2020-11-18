<?php

namespace App\Http\Controllers\API;

use App\Models\Grade;
use App\Http\Controllers\Controller;
use App\Http\Resources\GradeResource;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;


class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with(['enroll', 'schedule'])->latest()->paginate(10);
        return GradeResource::collection($grades);
    }

    public function store(StoreGradeRequest $request)
    {
        Grade::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Grade successfully created!'
        ], 201);
    }

    public function show(Grade $grade)
    {
        return new GradeResource($grade->load(['enroll', 'schedule']));
    }

    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        $grade->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Grade successfully updated!'
        ]);
    }

    public function destroy(Grade $grade)
    {
        if ($grade->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Grade successfully deleted!'
            ]);
        }
    }
}