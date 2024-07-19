<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable=['nombres','apellidos','celular','licencia_medica','especialidad','user_id',];

    public function consultas(){
        return $this->hasMany(Consulta::class);
    }
    
    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function enfermeras(){
        return $this->hasOne(Enfermera::class);
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }

    public function agendas(){
        return $this->hasOne(Agenda::class);
    }

    public function servicios(){
        return $this->hasMany(Servicio::class);
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
