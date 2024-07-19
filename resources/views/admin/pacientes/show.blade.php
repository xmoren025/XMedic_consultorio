@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">Paciente: {{$paciente->nombres}}</h1></div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>Datos registrados</b></h2><br>
            </div>

            <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombre</label>
                                <p>{{$paciente->nombres}} {{$paciente->apellidos}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">CURP</label> 
                                <p>{{$paciente->curp}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <p>{{$paciente->fecha_nacimiento}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Email</label> 
                                <p>{{$paciente->correo}}</p>
                            </div>
                        </div>
                    </div>                        
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sexo">Sexo</label>
                                <p>
                                    @if($paciente->sexo=='M')
                                        MASCULINO
                                    @else
                                        FEMENINO
                                    @endif        
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tipo sanguineo</label>
                                <p>{{$paciente->tipo_sanguineo}}</p>
                            </div>
                        </div>
                    </div>   
                    <br>
                    <div class="row">
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <p>{{$paciente->celular}}</p>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form group">
                                <label for="">Contacto de emergencia</label>
                                <p>{{$paciente->contacto_emergencia}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Alergias</label>
                                <p>{{$paciente->alergias}}</p>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form group">
                                <label for="">Dirección</label>
                                <p>{{$paciente->direccion}}</p>

                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Volver</a>                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection