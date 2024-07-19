<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermera extends User
{
    use HasFactory;

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
