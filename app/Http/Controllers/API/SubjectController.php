<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Prospectus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Resources\SubjectResource;
use Illuminate\Database\Eloquent\Builder;

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
            ->get();

        return SubjectResource::collection($subjects);
    }

    public function getGradeLevelSubjects(string $track_name, int $grade_level)
    {
        $subjects = Prospectus::with('subject')
            ->whereHas('track', function(Builder $query) use ($track_name, $grade_level) {
                $query->where('name', $track_name)
                    ->where('grade_level', $grade_level);
            })
            ->get();
        
        return SubjectResource::collection($subjects);
    }
}
