<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable=['dia','hora_inicio','hora_final','doctor_id'];


    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

}
