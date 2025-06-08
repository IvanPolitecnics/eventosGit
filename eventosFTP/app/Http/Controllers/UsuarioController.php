<?php

// app/Http/Controllers/UsuarioController.php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Mstrar la lista de usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios', compact('usuarios'));
    }

    // Eliminar un usuario
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito.');
    }
}
