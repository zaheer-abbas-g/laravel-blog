<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',[
            'data' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.store',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|min:6|max:30',
            'email'=> 'required|email|unique:users|max:255',
            'password' => 'required|min:5',
            'roles' => 'required'
        ]);


       $user = User::create($validation);
       $user->roles()->attach($request->roles);

       return redirect()->route('users.index')->with('success', 'User Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
         return view('admin.users.show',[
            'user' => $user
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.update',[
            'user' => $user,
            'user_roles' => $user->roles->pluck('id')->toArray(),
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validation = $request->validate([
            'name' => 'required|min:6|max:30',
            'email'=> 'required|email|max:255',
            'password' => 'required|min:5',
            'roles' => 'required'
        ]);

        $user->update($validation);
        $user->assignRoles($request->roles);

        return redirect()->route('users.show', $user->id)->with('success', 'User updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Removed successfully');

    }
}
