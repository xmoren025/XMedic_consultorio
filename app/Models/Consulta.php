<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    private $fillable=['cita_id','paciente_id','doctor_id','fecha','diagnostico','tratamiento','estado'];

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
