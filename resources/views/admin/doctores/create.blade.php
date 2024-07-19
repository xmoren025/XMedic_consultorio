@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">Registro de doctor</h1></div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>Formulario de registro</b></h2><br>
                Favor de llenar los datos
            </div>

            <div class="card-body">
                <form action="{{url('/admin/doctores/create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombre</label> <b>*</b>
                                <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Apellidos</label> <b>*</b>
                                <input type="text" value="{{old('apellidos')}}" name="apellidos" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label><b>*</b>
                                <input type="text" value="{{old('celular')}}" name="celular" class="form-control" required>
                                @error('celular')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Licencia médica</label><b>*</b>
                                <input type="text" value="{{old('licencia_medica')}}" name="licencia_medica" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Especialidad</label><b>*</b>
                                <select id="" name="especialidad" class="form-control" required>
                                    <option value="Pediatría">Pediatría</option>
                                    <option value="Cardiología">Cardiología</option>
                                    <option value="Dermatología">Dermatología</option>
                                    <option value="Gastroenterología">Gastroenterología</option>
                                    <option value="Oftalmología">Oftalmología</option>
                                    <option value="Otorrinolaringología">Otorrinolaringología</option>
                                    <option value="Neumología">Neumología</option>
                                    <option value="Radiología">Radiología</option>
                                    <option value="Urología">Urología</option>
                                    <option value="Ginecología">Ginecología</option>
                                </select>
                            </div>
                        </div>
                    </div>   
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Email</label> <b>*</b>
                                <input type="email" value="{{old('email')}}" name="email" class="form-control" required>
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
                                <input type="password" value="{{old('password')}}" name="password" class="form-control" required>
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
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection