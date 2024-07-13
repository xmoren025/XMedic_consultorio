<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.pacientes.index',compact ('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        
        $request->validate([
            'nombres'=> 'required',
            'apellidos'=> 'required',
            'sexo'=>'required',
            'curp'=> 'required|unique:pacientes',
            'celular'=>'required',

            'fecha_nacimiento' => 'required|date|before:today',
            'correo'=>'required|max:250|unique:pacientes',
            'direccion'=>'required',
            'tipo_sanguineo'=>'required',
            'alergias'=>'required',
            'contacto_emergencia'=>'required',
        ]);

        Paciente::create($request->all());


        return redirect()->route('admin.pacientes.index')->with('mensaje','Paciente registrado correctamente.')->with('icono','success');
            
    }   

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente=Paciente::findOrFail($id);
        return view('admin.pacientes.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit',compact('paciente')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $paciente = Paciente::find($id);
        $request->validate([
            'nombres'=> 'required',
            'apellidos'=> 'required',
            'sexo'=>'required',
            'curp'=> 'required|unique:pacientes',
            'celular'=>'required',

            'fecha_nacimiento' => 'required|date|before:today',
            'correo'=>'required|max:250|unique:pacientes',
            'direccion'=>'required',
            'tipo_sanguineo'=>'required',
            'alergias'=>'required',
            'contacto_emergencia'=>'required',
        ]);
        Paciente::edit($request->all());
        
        $usuario->save();
        return redirect()->route('admin.pacientes.index')
            ->with('mensaje','Datos actualizados correctamente.')
            ->with('icono','success');
    
    }

    public function confirmDelete($id){
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.delete',compact('paciente')); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        Paciente::destroy($id);
        return redirect()->route('admin.pacientes.index')
            ->with('mensaje','Paciente eliminado correctamente.')
            ->with('icono','success');
    }
}