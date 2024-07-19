@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">Modificar paciente: {{$paciente->nombres}} {{$paciente->apellidos}}</h1></div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>Editar datos</b></h2><br>
                Registre los datos que desea actualizar
            </div>

            <div class="card-body">
                <form action="{{url('admin/pacientes',$paciente->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombre</label> <b>*</b>
                                <input type="text" value="{{$paciente->nombres}}" name="nombres" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Apellidos</label> <b>*</b>
                                <input type="text" value="{{$paciente->apellidos}}" name="apellidos" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">CURP</label> <b>*</b>
                                <input type="text" value="{{$paciente->curp}}" name="curp" class="form-control" required>
                                @error('curp')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label><b>*</b>
                                <input type="date" id="fecha_nacimiento"  value="{{$paciente->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control">
                            </div>
                            @error('fecha_nacimiento')
                                <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label for="sexo">Sexo</label><b>*</b>
                            <select id="sexo" name="sexo" class="form-control">
                                <option value="M" @if($paciente->sexo == 'M') selected @endif>M</option>
                                <option value="F" @if($paciente->sexo == 'F') selected @endif>F</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Tipo sanguineo</label><b>*</b>
                            <select id="tipo_sanguineo" name="tipo_sanguineo" class="form-control" required>
                                <option value="A+" @if($paciente->tipo_sanguineo == 'A+') selected @endif>A+</option>
                                <option value="A-" @if($paciente->tipo_sanguineo == 'A-') selected @endif>A-</option>
                                <option value="B+" @if($paciente->tipo_sanguineo == 'B+') selected @endif>B+</option>
                                <option value="B-" @if($paciente->tipo_sanguineo == 'B-') selected @endif>B-</option>
                                <option value="O+" @if($paciente->tipo_sanguineo == 'O+') selected @endif>O+</option>
                                <option value="O-" @if($paciente->tipo_sanguineo == 'O-') selected @endif>O-</option>
                            </select>
                        </div>
                        </div>
                        
                    </div>   
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Email</label> <b>*</b>
                                <input type="email" value="{{$paciente->correo}}" name="correo" class="form-control" required>
                                @error('correo')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label><b>*</b>
                                <input type="text" value="{{$paciente->celular}}" name="celular" class="form-control" required>
                                @error('celular')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Contacto de emergencia</label><b>*</b>
                                <input type="text" value="{{$paciente->contacto_emergencia}}" name="contacto_emergencia" class="form-control" required>
                                @error('contacto_emergencia')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Dirección</label><b>*</b>
                                <input type="address" value="{{$paciente->direccion}}" name="direccion" class="form-control" required>
                                @error('direccion')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Alergias</label>
                                <input type="text" value="{{$paciente->alergias}}" name="alergias" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                        <hr>
                            <div class="form group">
                                <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Actualizar datos</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection