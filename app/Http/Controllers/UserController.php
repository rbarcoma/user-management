<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create(){

        return view('users.create');
    }

    public function edit(User $user){

    return view('users.edit', compact('user'));
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:11|',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'password' => Hash::make($request['password']), 
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }
 
    public function update( Request $request, User $user){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user),
            ],
            'phone_number' => 'required|string|max:11',
         ]);

         $user->update($validated);

         return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(int $id){

        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

}
