<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Paciente;


class AdminController extends Controller
{
    public function index(){
        $total_usuarios = User::count();
        $total_doctores = Doctor::count();
        $total_pacientes = Paciente::count();
        return view('admin.index',compact('total_usuarios','total_doctores','total_pacientes'));

    }
}
