@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;">Modificar horario del Dr. {{$horario->doctor->nombres}} {{$horario->doctor->apellidos}}</h1></div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>Editar horario</b></h2><br>
                Actualice los datos necesarios
            </div>

            <div class="card-body">
                <form action="{{ url('/admin/horarios', $horario->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Día</label><b>*</b>
                                <select id="dia" name="dia" class="form-control" required>
                                    <option value="Lunes" @if($horario->dia == 'Lunes') selected @endif>Lunes</option>
                                    <option value="Martes" @if($horario->dia == 'Martes') selected @endif>Martes</option>
                                    <option value="Miércoles" @if($horario->dia == 'Miércoles') selected @endif>Miércoles</option>
                                    <option value="Jueves" @if($horario->dia == 'Jueves') selected @endif>Jueves</option>
                                    <option value="Viernes" @if($horario->dia == 'Viernes') selected @endif>Viernes</option>
                                    <option value="Sábado" @if($horario->dia == 'Sábado') selected @endif>Sábado</option>
                                    <option value="Domingo" @if($horario->dia == 'Domingo') selected @endif>Domingo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Hora de inicio</label> <b>*</b>
                                <input type="time" value="{{$horario->hora_inicio}}" name="hora_inicio" class="form-control" required>
                                @error('hora_inicio')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Hora final</label> <b>*</b>
                                <input type="time" value="{{$horario->hora_final}}" name="hora_final" class="form-control" required>
                                @error('hora_final')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Doctor</label><b>*</b>
                                <select id="doctor_id" name="doctor_id" class="form-control" required>
                                    @foreach($doctores as $doctor)
                                        <option value="{{ $doctor->id }}" @if($horario->doctor_id == $doctor->id) selected @endif>
                                            {{ $doctor->nombres." ".$doctor->apellidos." - ".$doctor->especialidad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>   
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                        <hr>
                            <div class="form group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Actualizar horario</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection