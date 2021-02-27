<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnrollRequest;
use App\Http\Requests\UpdateEnrollRequest;
use App\Http\Resources\EnrollResource;
use App\Models\Enroll;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function index()
    {
        $enrolls = Enroll::with(['enrollmentOfficer', 'student', 'acadYear', 'section'])
            ->latest()->paginate(10);
        return EnrollResource::collection($enrolls);
    }

    public function store(StoreEnrollRequest $request)
    {
        Enroll::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Student successfully enrolled!'
        ], 201);
    }

    public function show(Enroll $enroll)
    {
        return new EnrollResource($enroll);
    }

    public function update(UpdateEnrollRequest $request, Enroll $enroll)
    {
        $enroll->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Enroll data successfully updated!'
        ]);
    }

    public function destroy(Enroll $enroll)
    {
        if ($enroll->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Enroll data successfully deleted!'
            ]);
        }
    }
}
