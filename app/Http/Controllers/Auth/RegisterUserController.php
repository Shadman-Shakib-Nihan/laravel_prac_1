<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>['required','min:3','max:25','alpha'],
            'email'=>['required','email','unique:users,email', 'max:255', 'string'],
            'password'=>['required','min:8', Password::defaults()],
        ]);
   
        //create a new user in the database
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        //login the user
        Auth::login($user);

        //redirect to the home page
        return redirect('/ideas');
    }
}