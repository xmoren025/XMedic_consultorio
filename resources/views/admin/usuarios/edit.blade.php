@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">Modificar usuario: {{$usuario->name}}</h1></div>

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>Editar datos</b></h2><br>
                Registre los datos que desea actualizar
            </div>

            <div class="card-body">
                <form action="{{url('admin/usuarios',$usuario->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Nombre</label>
                                <input type="text" value="{{$usuario->name}}" name="name" class="form-control" required>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Email</label>
                                <input type="email" value="{{$usuario->email}}" name="email" class="form-control" required>
                                @error('email')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Contraseña</label>
                                <input type="password" value="{{old('password')}}" name="password" class="form-control">
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
                                <label for="">Confirmar contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control">
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
                                <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar datos</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
