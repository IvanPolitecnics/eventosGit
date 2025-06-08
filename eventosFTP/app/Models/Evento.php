<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'ubicacion',
        'tipo_evento_id',
        'creador_id',
    ];

    public function tipoEvento()
    {
        return $this->belongsTo(TipoEvento::class, 'tipo_evento_id');
    }

    public function creador()
    {
        return $this->belongsTo(Usuario::class, 'creador_id');
    }
}
