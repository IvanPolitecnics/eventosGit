<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
    public function index()
    {
        $tiposEventos = TipoEvento::all();
        return view('tipos_eventos.index', compact('tiposEventos'));
    }

    public function create()
    {
        return view('tipos_eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        TipoEvento::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('tipos_eventos.index')->with('success', 'Tipo de evento creado correctamente.');
    }
}
