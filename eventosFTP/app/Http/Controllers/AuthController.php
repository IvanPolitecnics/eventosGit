<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
{
    // Traemos los tipos de usuario excluyendo el admin (id 1)
    $tiposUsuarios = \App\Models\TipoUsuario::where('id', '!=', 1)->get();
    return view('auth.register', compact('tiposUsuarios'));
}

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ]);
    }

    public function register(Request $request)
{
    $request->validate([
        'nombre' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email', 'unique:usuarios,email'],
        'password' => ['required'],
        'tipo_usuario_id' => ['required', 'in:2,3'],  // Solo pueden elegir id 2 o id 3 ya que si deja el 1 se podria poner como admin
    ]);

    $usuario = Usuario::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'tipo_usuario_id' => $request->tipo_usuario_id,  // Guardamos el tipo de usuario seleccionado
    ]);

    Auth::login($usuario);
    return redirect('/');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
