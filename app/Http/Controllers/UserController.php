<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    use ImageTrait;
/**
     * Display a listing of the resource.
     */
    public function index()
    {
//         dd(
//             Auth::user()->id,
//     Auth::user()->getRoleNames(),
//     Auth::user()->getPermissionNames(),
//     Auth::user()->can('view post')
// );
        Gate::authorize('view user');
        $users = User::get();
        return view('admin.users.all', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create user');
        $roles = Role::select('id', 'name')->get();
        return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        Gate::authorize('create user');

        // dd($request->all());
        $data = $request->validated();

        $user = User::create($data);

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);
        // $path = $request->file('image')->store('users', 'public');
        $path = $this->uploadImage($request->file('image'), 'users');
        $user->images()->create([
            'path' => $path
        ]);

        
        if ($request->filled('role')) {
            $role = Role::findorFail($request->role);

            $user->assignRole($role);
        }

        noty()->success('User created successfully');
        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        Gate::authorize('view user');
        // $user = User::findorFail($id);
        // dd($user);
        $user->load(['posts']);
        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('edit user');
        $user->load('roles');
        $roles = Role::select('id', 'name')->get();
        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        Gate::authorize('edit user');
        // echo $request->hasFile('image');
        // dd($request->all());
        $data = $request->validated();
        // dd($data);
        $user->roles()->sync($data['role']);
        $user->update($data);
        if ($request->hasFile('image')) {
            $oldImage = $user->images()->first();
            if ($oldImage) {
                $newPath = $this->updateImage($request->file('image'), 'users', $oldImage->path);

                $oldImage->update([
                    'path' => $newPath
                ]);
            } else {
                $newPath = $this->uploadImage($request->file('image'), 'users');

                $user->images()->create([
                    'path' => $newPath
                ]);
            }   


            // $path = $request->file('image')->store('users', 'public');
            // if ($user->images()->exists()) {
            //     $user->images()->update([
            //         'path' => $path
            //     ]);
            // } else {
            //     $user->images()->create([
            //         'path' => $path
            //     ]);
            // }
        }
        noty()->success('User updated successfully');
        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete user');
        if ($user->images()->exists()) {
            
            $image = $user->images()->first();

            // Storage::disk('public')->delete($image->path);
            $this->deleteImage($image->path);

            $image->delete();
        }
        $user->delete();
        noty()->success('User deleted successfully');
        return to_route('users.index');
    }
}
