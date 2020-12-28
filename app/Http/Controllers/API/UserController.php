<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->latest()->paginate(10);
        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['username'] = "{$request->first_name}.{$request->last_name}";
        $data['password'] = 'password';
        User::create($data);
        return response()->json([
            'success' => true,
            'message' => 'User successfully created!'
        ], 201);
    }

    public function show(User $user)
    {
        return new UserResource($user->load('role'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'User successfully updated!'
        ]);
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'User successfully deleted!'
            ]);
        }
    }

    public function getTeachers()
    {
        $teachers = User::whereHas('role', function(Builder $query) {
            $query->where('name', 'teacher');
        })->latest()->paginate(10);

        return UserResource::collection($teachers);
    }

    public function searchTeachers(Request $request)
    {
        $teachers = User::whereHas('role', function(Builder $query) {
                $query->where('name', 'teacher');
            })
            ->where('first_name', 'LIKE', '%'.$request->input('query').'%')
            ->orWhere('middle_name', 'LIKE', '%'.$request->input('query').'%')
            ->orWhere('last_name', 'LIKE', '%'.$request->input('query').'%')
            ->paginate(10);
        
        return UserResource::collection($teachers);
    }

    public function getTeacherScheduleWithGrade(Request $request)
    {
        return $request->user()->load([
            'schedules.grades', 
            'schedules.acadYear', 
            'schedules.section.track',
            'schedules.section.enrolls.student',
            'schedules.prospectus.subject'
        ]);
    }

    public function getTeachersAll()
    {
        $teachers = User::whereHas('role', function(Builder $query) {
            $query->where('name', 'teacher');
        })->latest()->get();

        return UserResource::collection($teachers);
    }
}
