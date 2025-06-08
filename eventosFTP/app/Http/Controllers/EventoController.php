<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\TipoEvento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();

        // Retornar la vista con los eventos
        return view('index', compact('eventos'));
    }
    public function create()
    {
        $tiposEventos = TipoEvento::all();

        // Pasar los tipos de eventos a la vista
        return view('formulario', compact('tiposEventos'));
    }

    // Guardar el evento en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'ubicacion' => 'required|string|max:255',
            'tipo_evento_id' => 'required|exists:tipos_eventos,id',
        ]);

        Evento::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'ubicacion' => $request->ubicacion,
            'tipo_evento_id' => $request->tipo_evento_id,
            'creador_id' => 1,
        ]);

        return redirect()->route('index')->with('success', 'Evento guardado correctamente.');
    }
}
