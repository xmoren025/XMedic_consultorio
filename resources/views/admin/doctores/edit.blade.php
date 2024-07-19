@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">Modificar doctor: {{$doctor->nombres}} {{$doctor->apellidos}}</h1></div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>Editar datos</b></h2><br>
                Registre los datos que desea actualizar
            </div>

            <div class="card-body">
                <form action="{{url('/admin/doctores',$doctor->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombre</label> <b>*</b>
                                <input type="text" value="{{$doctor->nombres}}" name="nombres" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Apellidos</label> <b>*</b>
                                <input type="text" value="{{$doctor->apellidos}}" name="apellidos" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label><b>*</b>
                                <input type="text" value="{{$doctor->celular}}" name="celular" class="form-control" required>
                                @error('celular')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Licencia médica</label><b>*</b>
                                <input type="text" value="{{$doctor->licencia_medica}}" name="licencia_medica" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Especialidad</label><b>*</b>
                                <select id="especialidad" name="especialidad" class="form-control" required>
                                    <option value="Pediatría" @if($doctor->especialidad == 'Pediatría') selected @endif>Pediatría</option>
                                    <option value="Cardiología" @if($doctor->especialidad == 'Cardiología') selected @endif>Cardiología</option>
                                    <option value="Dermatología" @if($doctor->especialidad == 'Dermatología') selected @endif>Dermatología</option>
                                    <option value="Gastroenterología" @if($doctor->especialidad == 'Gastroenterología') selected @endif>Gastroenterología</option>
                                    <option value="Oftalmología" @if($doctor->especialidad == 'Oftalmología') selected @endif>Oftalmología</option>
                                    <option value="Otorrinolaringología" @if($doctor->especialidad == 'Otorrinolaringología') selected @endif>Otorrinolaringología</option>
                                    <option value="Neumología" @if($doctor->especialidad == 'Neumología') selected @endif>Neumología</option>
                                    <option value="Radiología" @if($doctor->especialidad == 'Radiología') selected @endif>Radiología</option>
                                    <option value="Urología" @if($doctor->especialidad == 'Urología') selected @endif>Urología</option>
                                    <option value="Ginecología" @if($doctor->especialidad == 'Ginecología') selected @endif>Ginecología</option>
                                </select>
                            </div>
                        </div>
                    </div>   
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Email</label> <b>*</b>
                                <input type="email" value="{{$doctor->user->email}}" name="email" class="form-control" required>
                                @error('email')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Contraseña</label><b>*</b>
                                <input type="password" name="password" class="form-control" required>
                                @error('password')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Confirmar contraseña</label><b>*</b>
                                <input type="password" name="password_confirmation" class="form-control" required>
                                @error('password_confirmation')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                        <hr>
                            <div class="form group">
                                <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Cancelar</a>
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