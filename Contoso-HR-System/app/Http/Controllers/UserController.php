<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;



class UserController extends Controller
{
    public function create()
    {
        return view('hr.addingusers');

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:employee,hr,director',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('hr.addingusers')
                ->withErrors($validator)
                ->withInput();
        }
    
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
    
        $role = $request->input('role');
        $user->assignRole(ucfirst($role));
    
        return redirect()->route('hr.addingusers')->with('success', 'User added successfully.');
    }
    
}
