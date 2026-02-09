<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Show the signup form
     */
    public function signupForm()
    {
        return view('auth.signup');
    }

    /**
     * Register a new user
     */
    public function signup(Request $request)
    {
        $user = new User();
        $user->username = $request->get('username');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->rol = 'member';
        $user->save();

        Auth::login($user);

        return redirect()->route('events.index');
    }

    /**
     * Show the login form
     */
    public function loginForm()
    {
        if(Auth::viaRemember()) {
            return 'Bienvenido de nuevo, ' . Auth::user()->name . '!';
        } else if(Auth::check()) {
            return redirect()->route('users.account');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Authenticate user and login
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $errors = [];
        if (empty($credentials['email'])) {
            $errors['email'] = 'El campo email es obligatorio.';
        }
        if (empty($credentials['password'])) {
            $errors['password'] = 'El campo contraseña es obligatorio.';
        }

        if (!empty($errors)) {
            return back()->withErrors($errors)->onlyInput('email');
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('events.index'));
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Logout the authenticated user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}

