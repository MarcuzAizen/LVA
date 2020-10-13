<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(10);
        return RoleResource::collection($roles);
    }

    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Role successfully created!'
        ], 201);
    }

    public function show(Role $role)
    {
        return response()->json([
            'data' => new RoleResource($role)
        ]);
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Role successfully updated!'
        ]);
    }

    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Role successfully deleted!'
            ]);
        }
    }
}
