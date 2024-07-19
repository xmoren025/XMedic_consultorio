@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">Usuario: {{$usuario->name}}</h1></div>

<hr>

<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>Datos registrados</b></h2><br>
            </div>

            <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Nombre:</label>
                                <p>{{$usuario->name}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Email:</label>
                                <p>{{$usuario->email}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
