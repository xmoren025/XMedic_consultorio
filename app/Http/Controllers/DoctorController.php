<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctores = Doctor::with('user')->get();
        return view('admin.doctores.index',compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres'=> 'required',
            'apellidos'=> 'required',
            'celular'=>'required',
            'licencia_medica'=>'required',
            'especialidad'=>'required',
            'email'=>'required|max:250|unique:users',
            'password'=>'required|max:250|confirmed',
        ]);

        // Crear el usuario
        $user = new User([
            'name' => $request->get('nombres') . ' ' . $request->get('apellidos'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $user->save();

        // Crear el doctor y asociarlo al usuario
        $doctor = new Doctor([
            'nombres' => $request->get('nombres'),
            'apellidos' => $request->get('apellidos'),
            'celular' => $request->get('celular'),
            'licencia_medica' => $request->get('licencia_medica'),
            'especialidad' => $request->get('especialidad'),
            'user_id' => $user->id, // Asociar el doctor con el usuario recién creado
        ]);
        $doctor->save();

        return redirect()->route('admin.doctores.index')->with('mensaje','Doctor registrado correctamente.')->with('icono','success');
            
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor=Doctor::findOrFail($id);
        return view('admin.doctores.show',compact('doctor'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor=Doctor::findOrFail($id);
        return view('admin.doctores.edit',compact('doctor'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $user = $doctor->user;

        $validatedData = $request->validate([
            'nombres'=> 'required',
            'apellidos'=> 'required',
            'celular'=> 'required',
            'licencia_medica'=> 'required',
            'especialidad'=> 'required',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password'=>'nullable|max:250|confirmed',
        ]);

        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->celular = $request->celular;
        $doctor->licencia_medica = $request->licencia_medica;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        $usuario = User::find($doctor->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $validatedData['email'];

        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);

        }
        $usuario->save();
        return redirect()->route('admin.doctores.index')
            ->with('mensaje','Datos actualizados correctamente.')
            ->with('icono','success');


    }

    public function confirmDelete($id){
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.delete',compact('doctor')); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        
        $user = $doctor->user;
        $user->delete();

        $doctor->delete();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje','Doctor eliminado correctamente.')
            ->with('icono','success');
    }
}
