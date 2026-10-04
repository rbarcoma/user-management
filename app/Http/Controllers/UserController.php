<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:11|',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::creat([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'passowrd' => Hash::make($request['password']), 
        ]);

        return redirect()->route('')->with('sucess', 'User added successfully!');
    }

    public function destroy(int $id){

        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

}
