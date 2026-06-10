<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $validated = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required','string',Password::defaults()],
        ]);

        //attempt to login the user
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect('/ideas');
        }

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.'
        ]);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        Auth::logout();
        return redirect('/ideas');
    }
}
