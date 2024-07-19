<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public function producto(){
        return $this->belogsTo(Producto::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
