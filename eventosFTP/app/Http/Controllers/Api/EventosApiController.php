<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;

class EventosApiController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $eventos = Evento::whereDate('fecha_inicio', '<=', $end)
                         ->whereDate('fecha_fin', '>=', $start)
                         ->get();

        $datos = $eventos->map(function ($evento) {
            return [
                'title' => $evento->titulo,
                'start' => $evento->fecha_inicio,
                'end' => $evento->fecha_fin,
                'url' => '#', // Puedes cambiar por enlace real
            ];
        });

        return response()->json($datos);
    }
}
