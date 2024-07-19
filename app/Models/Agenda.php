<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }

    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function consultas(){
        return $this->hasMany(Consulta::class);
    }
}
