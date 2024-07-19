<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'curp',
        'fecha_nacimiento',
        'sexo',
        'correo',
        'celular',
        'direccion',
        'tipo_sanguineo',
        'alergias',
        'contacto_emergencia',
    ];

    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function consultas(){
        return $this->hasMany(Consulta::class);
    }
}
