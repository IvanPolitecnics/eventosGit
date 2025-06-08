<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    use HasFactory;

    protected $table = 'tipos_eventos';

    protected $fillable = ['nombre'];

    // Relación con la tabla de eventos
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'tipo_evento_id');
    }
}











// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class TipoEvento extends Model
// {
//     use HasFactory;

//     protected $table = 'tipos_eventos';

//     protected $fillable = ['nombre'];

//     public function eventos()
//     {
//         return $this->hasMany(Evento::class);
//     }
// }
