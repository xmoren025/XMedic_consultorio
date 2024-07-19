<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function doctors(){
        return $this->belognsTo(Doctor::class);
    }

    public function venta(){
        return $this->hasMany(venta::class);
    }

    public function secretarias(){
        return $this->belongsTo(Secretaria::class);
    }
}
