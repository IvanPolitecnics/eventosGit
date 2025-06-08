<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;

    protected $table = 'tipos_usuarios';

    // Relación inversa con Usuario
    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
