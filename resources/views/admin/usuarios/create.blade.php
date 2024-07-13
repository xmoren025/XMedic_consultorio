@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">Registro de usuario</h1></div>

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>Formulario de registro</b></h2><br>
                Favor de llenar los datos
            </div>

            <div class="card-body">
                <form action="{{url('/admin/usuarios/create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Nombre</label> <b>*</b>
                                <input type="text" value="{{old('name')}}" name="name" class="form-control" required>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
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
                    <div class="col-md-5">
                            <div class="form-group">
                                <label>Rol</label><b>*</b>
                                <select id="tipo" name="tipo" class="form-control" required>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Secretaria">Secretaria</option>
                                    <option value="Doctor">Doctor</option>
                                </select>
                            </div>
                        </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Contraseña</label><b>*</b>
                                <input type="password" value="{{old('password')}}" name="password" class="form-control" required>
                                @error('password')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
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
                            <div class="form group">
                                <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Cancelar</a>
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