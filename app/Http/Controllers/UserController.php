<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role') -> get();
        return view('users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $roles = Role::all();
        return view('create-user',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'=>'required',
            'email'=> 'required | email',
            'password' => 'required | confirmed',
            'role'=>'required'
        ]);

        $user = User::create([
            'name' => $request -> name ,
            'email'=> $request -> email,
            'password'=> Hash::make($request -> password),
        ]);

        $user -> role() -> attach($request -> role);
        return redirect() -> route('users.index') -> with('status' ,'New user added successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user -> delete();
        return redirect() -> route('users.index') -> with('status','User deleted successfully');
    }
}
