<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    public function secretarias(){
        return $this->belongsTo(Secretaria::class);
    }

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
}
