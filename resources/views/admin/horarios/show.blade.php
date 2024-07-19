@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">Horario de Dr. {{$horario->doctor->apellidos}}</h1></div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>Datos registrados</b></h2><br>
            </div>

            <div class="card-body">
               
                    <div class="row">

                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Doctor</label>
                                    <p>{{$horario->doctor->nombres." ".$horario->doctor->apellidos." - ".$horario->doctor->especialidad}}</p>
                                </div>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Día</label>
                                <p>
                                    @if($horario->dia == 'Lunes')
                                        Lunes
                                    @elseif($horario->dia == 'Martes')
                                        Martes
                                    @elseif($horario->dia == 'Miércoles')
                                        Miércoles
                                    @elseif($horario->dia == 'Jueves')
                                        Jueves
                                    @elseif($horario->dia == 'Viernes')
                                        Viernes
                                    @elseif($horario->dia == 'Sábado')
                                        Sábado
                                    @elseif($horario->dia == 'Domingo')
                                        Domingo
                                    @else
                                        Inválido
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Hora de inicio</label> 
                                <p>{{$horario->hora_inicio}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Hora final</label>
                                <p>{{$horario->hora_final}}</p>
                            </div>
                        </div>
                        
                    </div>   
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                        <hr>
                            <div class="form group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection