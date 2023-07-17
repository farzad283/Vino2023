<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomAuthController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }


    public function create()
    {
        return view('auth.create');
    }

    public function store(Request $request)
    {
        
        $request->validate( [
            'first_name' => 'required|regex:/^[a-zA-ZÀ-ÿ\s\-]+$/|min:2', /* Accepte les lettres FR en majuscule et minuscule ainsi que les lettre EN.  */
            'last_name' => 'required|regex:/^[a-zA-ZÀ-ÿ\s\-]+$/|min:2',            
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auth::login($user);

        return redirect(route('login'))->withSuccess('Votre compte a été créé avec succès!'); 
    }

    public function authentication(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');


        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('bottles'));
        }
        
        return redirect()->back()->withErrors('Courriel ou mot de passe invalide');
        
    }

}