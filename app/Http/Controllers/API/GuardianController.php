<?php

namespace App\Http\Controllers\API;

use App\Models\Guardian;
use App\Http\Controllers\Controller;
use App\Http\Resources\GuardianResource;
use App\Http\Requests\StoreGuardianRequest;
use App\Http\Requests\UpdateGuardianRequest;

class GuardianController extends Controller
{
    public function index()
    {
        $guardians = Guardian::with('students')->latest()->paginate(10);
        return GuardianResource::collection($guardians);
    }

    public function store(StoreGuardianRequest $request)
    {
        Guardian::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Guardian successfully created!'
        ], 201);
    }

    public function show(Guardian $guardian)
    {
        return new GuardianResource($guardian->load('students'));
    }

    public function update(UpdateGuardianRequest $request, Guardian $guardian)
    {
        $guardian->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Guardian successfully updated!'
        ]);
    }

    public function destroy(Guardian $guardian)
    {
        $guardian->students()->detach();
        if ($guardian->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Guardian successfully deleted!'
            ]);
        }
    }
}
