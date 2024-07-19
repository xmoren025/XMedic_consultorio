<?php
namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Doctor;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::with('doctor')->get();
        return view('admin.horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $horarios = Horario::with('doctor')->get();
        $doctores = Doctor::all();
        return view('admin.horarios.create', compact('doctores','horarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'dia' => 'required|string',
            'hora_inicio' => 'required|string',
            'hora_final' => 'required|string',
        ]);

        // Validar que no exista un horario solapado
        $horarioExistente = Horario::where('dia', $request->dia)
            ->where(function($query) use ($request) {
                $query->whereBetween('hora_inicio', [$request->hora_inicio, $request->hora_final])
                      ->orWhereBetween('hora_final', [$request->hora_inicio, $request->hora_final])
                      ->orWhere(function($query) use ($request) {
                          $query->where('hora_inicio', '<=', $request->hora_inicio)
                                ->where('hora_final', '>=', $request->hora_final);
                      });
            })
            ->where(function($query) use ($request) {
                $query->where('doctor_id', $request->doctor_id)
                      ->orWhere(function($query) use ($request) {
                          $query->where('doctor_id', '!=', $request->doctor_id);
                      });
            })
            ->exists();

            if ($horarioExistente) {
                return redirect()->back()->withInput()->with('mensaje','Ya existe un horario con los datos ingresados.')->with('icono','error');
            }  

        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')->with('mensaje', 'Horario registrado correctamente.')->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::with('doctor')->findOrFail($id);
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        $doctores = Doctor::all();
        return view('admin.horarios.edit', compact('horario', 'doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'dia' => 'required|string',
            'hora_inicio' => 'required|string',
            'hora_final' => 'required|string',
        ]);

        // Validar que no exista un horario solapado, excluyendo el horario actual
        $horarioExistente = Horario::where('dia', $request->dia)
            ->where(function($query) use ($request) {
                $query->whereBetween('hora_inicio', [$request->hora_inicio, $request->hora_final])
                      ->orWhereBetween('hora_final', [$request->hora_inicio, $request->hora_final])
                      ->orWhere(function($query) use ($request) {
                          $query->where('hora_inicio', '<=', $request->hora_inicio)
                                ->where('hora_final', '>=', $request->hora_final);
                      });
            })
            ->where('id', '!=', $id) 
            ->where(function($query) use ($request) {
                $query->where('doctor_id', $request->doctor_id)
                      ->orWhere(function($query) use ($request) {
                          $query->where('doctor_id', '!=', $request->doctor_id);
                      });
            })
            ->exists();

        if ($horarioExistente) {
            return redirect()->back()->withInput()->with('mensaje','Ya existe un horario con los datos ingresados.')->with('icono','error');
        }    
        $horario = Horario::findOrFail($id);
        $horario->update($request->all());

        return redirect()->route('admin.horarios.index')->with('mensaje', 'Horario actualizado correctamente.')->with('icono', 'success');
    }

    /**
     * Show the form for confirming the deletion of the specified resource.
     */
    public function confirmDelete($id)
    {
        $horario = Horario::with('doctor')->findOrFail($id);
        return view('admin.horarios.delete', compact('horario'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return redirect()->route('admin.horarios.index')->with('mensaje', 'Horario eliminado correctamente.')->with('icono', 'success');
    }
}