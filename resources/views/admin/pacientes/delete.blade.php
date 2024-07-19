@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">El paciente {{$paciente->nombres}} {{$paciente->apellidos}} será eliminado del sistema.</h1></div>

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h2 class="card-title"><b>¿Está seguro de eliminar este registro?</b></h2><br>
                
            </div>

            <div class="card-body">
                <form action="{{url('/admin/pacientes',$paciente->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Nombre:</label>
                                {{$paciente->nombres}} {{$paciente->apellidos}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Email</label>
                                {{$paciente->correo}}                                
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection