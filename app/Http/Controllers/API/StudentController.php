<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use App\Models\Guardian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\StoreStudentGuardianRequest;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()
            ->paginate(10, [
                'id',
                'lrn',
                'last_name',
                'first_name',
                'middle_name',
                'suffix',
                'sex',
                'religion',
                'contact_number'
            ]);

        return StudentResource::collection($students);
    }

    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();
        $data['username'] = "{$request->first_name}.{$request->last_name}";
        $data['password'] = 'password';
        Student::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Student successfully created!'
        ], 201);
    }

    public function show(Student $student)
    {
        return new StudentResource($student->load('guardians'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Student successfully updated!'
        ]);
    }

    public function destroy(Student $student)
    {
        $student->guardians()->detach();
        if ($student->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Student successfully deleted!'
            ]); 
        }
    }

    public function addGuardian(StoreStudentGuardianRequest $request, Student $student)
    {
        $data = $request->validated();
        unset($data['relationship']);
        $guardian = Guardian::updateOrCreate($data, $data);
        $guardian->students()->sync([
            $student->id => ['relationship' => $request->relationship]
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Guardian successfully added to the student!'
        ]); 
    }

    public function removeGuardian(Student $student, Guardian $guardian)
    {
        $query = $student->guardians()
            ->wherePivot('guardian_id', $guardian->id)
            ->first();

        $student->guardians()->detach($guardian);
        return response()->json([
            'success' => $query ? true: false,
            'message' => $query ? 'Guardian successfully removed from the student!'
                                : 'Guardian is not related to the student!'
        ], $query ? 200 : 404);
    }

    public function search(Request $request)
    {
        $subjects = Student::where('first_name', 'LIKE', '%'.$request->input('query').'%')
            ->orWhere('middle_name', 'LIKE', '%'.$request->input('query').'%')
            ->orWhere('last_name', 'LIKE', '%'.$request->input('query').'%')
            ->orWhere('suffix', 'LIKE', '%'.$request->input('query').'%')
            ->orWhere('religion', 'LIKE', '%'.$request->input('query').'%')
            ->orWhere('contact_number', 'LIKE', '%'.$request->input('query').'%')
            ->get();

        return StudentResource::collection($subjects);
    }

    public function checkLrn(Request $request)
    {
        return response()->json([
            'exists' => Student::where('lrn', $request->lrn)->exists()
        ]);
    }
}
