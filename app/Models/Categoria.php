<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    public function eliminar()
    {
        $this->estado = 0; // Cambiamos el estado a inactivo
        $this->save();
    }
}
