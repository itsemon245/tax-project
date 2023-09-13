<?php

namespace App\Http\Controllers\Backend\User;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\backend\UserProfileUpdateRequest;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:read user', [
            'only' => ['index', 'show']
        ]);
        $this->middleware('can:create user',   [
            'only' => ['create', 'store']
        ]);
        $this->middleware('can:update user',   [
            'only' => ['update', 'edit']
        ]);
        $this->middleware('can:delete user',  [
            'only' => ['destroy']
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = User::with('roles')->whereNot('id', auth()->id())->latest()->simplePaginate(paginateCount());
        return view('backend.users.view-users', compact('user', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create-users', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'user_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'admin_ref' => 'required',
        ]);

        $userData = new User();
        $userData->name = $request->name;
        $userData->user_name = $request->user_name;
        $userData->email = $request->email;
        $userData->email_veified_at = now();
        $userData->admin_ref = $request->admin_ref;
        $userData->phone = $request->phone;
        $userData->password = Hash::make($request->password);
        if ($request->hasFile('user_image')) {
            $userData->image_url = saveImage($request->user_image, 'profile', 'user-image');
        }
        $userData->save();
        $userData->assignRole($request->role_id);

        $notification = [
            'message' => 'User Profile Created',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $userRole = User::with('roles')->where('id', $user->id)->first();
        //dd($userRole);
        $roles = Role::all();
        return view('backend.users.edit-users', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserProfileUpdateRequest $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'user_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'admin_ref' => 'required',
        ]);

        $userData = User::findOrFail($id);
        $userData->name = $request->name;
        $userData->user_name = $request->user_name;
        $userData->email = $request->email;
        $userData->admin_ref = $request->admin_ref;
        $userData->phone = $request->phone;
        $userData->password = Hash::make($request->password);
        if ($request->hasFile('user_image')) {
            $old_path = $userData->image_url;
            $userData->image_url = updateFile($request->user_image,  $old_path, 'profile', 'user-image');
        }
        $userData->save();
        $userData->assignRole($request->role_id);

        $notification = [
            'message' => 'User Profile Updated',
            'alert-type' => 'success',
        ];
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $explode = explode('/', $user->image_url);
        $imageName = end($explode);
        $path = 'public/uploads/profile/' . $imageName;
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
        User::where('id', $id)->delete();

        $notification = [
            'message' => 'User Profile Deleted Successfully',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }
}
