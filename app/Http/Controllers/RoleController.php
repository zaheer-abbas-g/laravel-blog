<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',['roles'=> $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|unique:roles|min:3|max:30',
            'slug'=> 'required|unique:roles|max:255',
        ]);

       $role = Role::create($validation);

       return redirect()->route('roles.index')->with('success', 'Role Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show',[
            'role' => $role
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.update',[
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validation = $request->validate([
            'name' => 'required|min:3|max:30',
            'slug'=> 'required|max:255',
            
        ]);

        $role->update($validation);

        return redirect()->route('roles.show', $role->id)->with('success', 'Role updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role Removed successfully');
    }
}
