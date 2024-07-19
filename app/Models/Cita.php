<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function doctors(){
        return $this->belongsTo(Doctor::class);
    }

    public function agendas(){
        return $this->belongsTo(Agenda::class);
    }
}
