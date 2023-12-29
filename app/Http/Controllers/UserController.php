<?php

namespace App\Http\Controllers;

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
        return view('admin.users.users',[
            'data' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.add_user');
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
        ]);

       $user = User::create($validation);

       return response()->json([
        'message'=> 'Successfully User Added',
        'data' => $user
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
         return response()->json([
            'data' => $user,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit_user',[
            'data' => $user
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
        ]);

        $user->update($validation);

        return response()->json([
            'message'=> 'Successfully User Updated',
            'data' => $user
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message'=> 'user deleted'
        ]);
    }
}
