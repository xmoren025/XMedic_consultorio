<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;

    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }

    public function servicios(){
        return $this->hasMany(Servicio::class);
    }

    public function consultas(){
        return $this->hasMany(Consulta::class);
    }

}
