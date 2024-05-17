<?php

namespace App\Http\Controllers\Backend\Role;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->latest()->paginate(paginateCount());
        return view('backend.role.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get()->groupBy('group');
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
        return redirect(route('role.index'))->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get()->groupBy('group');
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
        $role->updated_at = now();
        $role->syncPermissions($request->permissions);
        $role->update();
        $notification = [
            'message' => "Role Updated",
            'alert-type' => "success"
        ];
        return redirect(route('role.index'))->with($notification);
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
