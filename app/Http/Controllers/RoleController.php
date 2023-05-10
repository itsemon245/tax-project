<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->get();
        return view('backend.role.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('backend.role.createRole', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request)
    {

        $role = Role::create([
            'name' => str($request->role)->lower(),
        ]);
        $notification = [
            'message' => 'New Role Created',
            'alert-type' => 'success',
        ];
        $role->syncPermissions($request->permissions);
        return back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        $rolePermissions = $role->permissions()->pluck('id');
        return view('backend.role.editRole', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role' => [
                'required',
                'string',
                'max:25',
                Rule::unique('roles', 'name')->ignore($role->id),
            ]
        ]);
        $role->name = $request->role;
        $role->syncPermissions($request->permissions);
        $role->update();
        $notification = [
            'message' => "Role Updated",
            'alert-type' => "success"
        ];
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $notification = [
            'message' => "Role Deleted",
            'alert-type' => "success"
        ];
        return back()->with($notification);
    }
}
