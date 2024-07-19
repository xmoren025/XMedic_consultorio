@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">Dr. {{$doctor->apellidos}}</h1></div>

<hr>

<div class="row">
    <div class="col-md-8">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>Datos registrados</b></h2><br>
            </div>

            <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Nombre</label>
                                <p>{{$doctor->nombres}} {{$doctor->apellidos}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <p>{{$doctor->celular}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Email</label>
                                <p>{{$doctor->user->email}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">       
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Licencia médica</label>
                                <p>{{$doctor->licencia_medica}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Especialidad</label>
                                <p>
                                    @if($doctor->especialidad == 'Pediatría')
                                        Pediatría
                                    @elseif($doctor->especialidad == 'Cardiología')
                                        Cardiología
                                    @elseif($doctor->especialidad == 'Dermatología')
                                        Dermatología
                                    @elseif($doctor->especialidad == 'Gastroenterología')
                                        Gastroenterología
                                    @elseif($doctor->especialidad == 'Oftalmología')
                                        Oftalmología
                                    @elseif($doctor->especialidad == 'Otorrinolaringología')
                                        Otorrinolaringología
                                    @elseif($doctor->especialidad == 'Neumología')
                                        Neumología
                                    @elseif($doctor->especialidad == 'Radiología')
                                        Radiología
                                    @elseif($doctor->especialidad == 'Urología')
                                        Urología
                                    @elseif($doctor->especialidad == 'Ginecología')
                                        Ginecología
                                    @else
                                        Otra especialidad
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>   
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                        <hr>
                            <div class="form group">
                                <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection