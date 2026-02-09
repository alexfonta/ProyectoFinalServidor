<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Mostrar formulario de login
     */
    public function showLogin() {
        if(Auth::check()) {
            return redirect()->route('index');
        }
        return view('auth.login');
    }

    /**
     * Procesar login
     */
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index')->with('success', 'Has iniciado sesión correctamente');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Mostrar formulario de registro
     */
    public function showSignup() {
        if(Auth::check()) {
            return redirect()->route('index');
        }
        return view('auth.signup');
    }

    /**
     * Procesar registro
     */
    public function signup(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'rol' => 'member' // Por defecto nuevo usuario es member
        ]);

        Auth::login($user);

        return redirect()->route('index')->with('success', 'Registro completado correctamente');
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index')->with('success', 'Has cerrado sesión correctamente');
    }

    /**
     * Ver perfil de cuenta
     */
    public function account() {
        return view('users.account');
    }

    /**
     * Listar todos los usuarios (solo admin)
     */
    public function list() {
        if(Auth::check() && Auth::user()->rol == 'admin') {
            $users = User::get();
            return view('users.list',compact('users'));
        }
        return redirect()->route('index')->with('error', 'No tienes permisos para acceder a este recurso');
    }

    /**
     * Mostrar formulario de edición de usuario (solo admin)
     */
    public function edit(User $user) {
        if(Auth::check() && Auth::user()->rol == 'admin') {
            return view('users.edit', compact('user'));
        }
        return redirect()->route('index')->with('error', 'No tienes permisos para acceder a este recurso');
    }

    /**
     * Actualizar usuario (solo admin)
     */
    public function update(Request $request, User $user) {
        if(Auth::check() && Auth::user()->rol == 'admin') {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'rol' => 'required|in:admin,member,shop'
            ]);

            $user->update($validated);
            return redirect()->route('users.list')->with('success', 'Usuario actualizado correctamente');
        }
        return redirect()->route('index')->with('error', 'No tienes permisos para acceder a este recurso');
    }

    /**
     * Eliminar usuario (solo admin)
     */
    public function destroy(User $user) {
        if(Auth::check() && Auth::user()->rol == 'admin') {
            if(Auth::user()->id === $user->id) {
                return redirect()->route('users.list')->with('error', 'No puedes eliminarte a ti mismo');
            }
            $user->delete();
            return redirect()->route('users.list')->with('success', 'Usuario eliminado correctamente');
        }
        return redirect()->route('index')->with('error', 'No tienes permisos para acceder a este recurso');
    }
}
