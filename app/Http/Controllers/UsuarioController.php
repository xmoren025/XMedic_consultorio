<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::all();
        return view('admin.usuarios.index',compact('usuarios'));
    }

    public function create(){
        return view('admin.usuarios.create');
    }

    public function store(Request $request){
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'name'=>'required|max:250',
            'email'=>'required|max:250|unique:users',
            'password'=>'required|max:250|confirmed',
        ]);
    
        $usuario = new User();
        $usuario->name =$request->name;
        $usuario->email =$request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje','Usuario registrado correctamente.')
            ->with('icono','success');
    }

    public function show($id){
        //echo $id;
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show',compact('usuario'));

    }

    public function edit($id){
        //echo $id;
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit',compact('usuario')); 
    }

    public function update(Request $request, $id){
        $usuario = User::findOrFail($id);
        
        $validatedData = $request->validate([
            'name'=>'required|max:250',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($usuario->id)],
            'password'=>'nullable|max:250|confirmed',

        ]);
        $usuario->name = $request->name;
        $usuario->email = $validatedData['email'];
        
        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);

        }
        $usuario->save();
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje','Datos actualizados correctamente.')
            ->with('icono','success');
    
    }

    public function confirmDelete($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete',compact('usuario')); 
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje','Usuario eliminado correctamente.')
            ->with('icono','success');
    }
}

