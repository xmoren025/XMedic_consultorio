@extends('layouts.admin')

@section('content')
<div class="row">
    <h1 style="margin-left: 20px;">Horario del Dr. {{$horario->doctor->apellidos}} será eliminado del sistema.</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-8">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>¿Está seguro de eliminar este registro?</b></h2><br>
            </div>

            <div class="card-body">
                <form action="{{url('/admin/horarios', $horario->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Doctor</label>
                                <p>{{$horario->doctor->nombres}} {{$horario->doctor->apellidos}} - {{$horario->doctor->especialidad}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hora de inicio</label>
                                <p>{{$horario->hora_inicio}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hora final</label>
                                <p>{{$horario->hora_final}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="form-group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar registro</button>
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
@endsection