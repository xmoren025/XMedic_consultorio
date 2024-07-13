@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">El usuario {{$usuario->name}} será eliminado.</h1></div>

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h2 class="card-title"><b>¿Está seguro de eliminar este registro?</b></h2><br>
                
            </div>

            <div class="card-body">
                <form action="{{url('/admin/usuarios',$usuario->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Nombre:</label>
                                {{$usuario->name}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Email</label>
                                {{$usuario->email}}                                
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Cancelar</a>
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