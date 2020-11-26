<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Resources\SubjectResource;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::latest()->paginate(10);
        return SubjectResource::collection($subjects);
    }

    public function store(StoreSubjectRequest $request)
    {
        Subject::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Subject Successfully Created',
        ], 201);
    }

    public function show(Subject $subject)
    {
        return new SubjectResource($subject);
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Subject Successfully Updated',
        ]);
    }

    public function destroy(Subject $subject)
    {
        if($subject->delete())
        {
            return response()->json([
                'success' => true,
                'message' => 'Subject Successfully Deleted',
            ]);
        }
    }

    public function search(Request $request)
    {
        $subjects = Subject::where('code', 'LIKE', '%'.$request->input('query').'%')
            ->orWhere('description', 'LIKE', '%'.$request->input('query').'%')
            ->paginate(10);

        return SubjectResource::collection($subjects);
    }
}
