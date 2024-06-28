<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
//CANDIDATE FUNCTIONS
    public function registerCandidate(Request $request){
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',[
                'password.confirmed' => 'The passwords do not match.',
            ]
        ]);

       
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

       
        $user->attachRole('Candidate');

        
        return redirect()->route('home')->with('success', 'Registration successful! You can now login.');


    }
    //RECRUITER FUNCTIONS
    public function registerRecruiter(Request $request){
       
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',[
                    'password.confirmed' => 'The passwords do not match.',
                ]
            ]);
    
           
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
           
            $user->attachRole('Recruiter');
    
            
            return redirect()->route('home')->with('success', 'Registration successful! You can now login.');
    
    
        }

//LOGIN FUNCTION


public function login(Request $request)
{
    
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials, $request->filled('remember'))) {

        if (Auth::user()->hasRole('Admin')) {
        return redirect()->intended(route('admins.index'));

    }
    if (Auth::user()->hasRole('Recruiter')) {
        return redirect()->intended(route('recruiters.recruiter', ['user' => Auth::user()]));

    }
    if (Auth::user()->hasRole('Candidate')) {
        return redirect()->intended(route('candidates.candidate', ['user' => Auth::user()]));

    }
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ])->withInput();
}
//LOGOUT FUNCTION
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}


}
