@extends('layouts.admin')

@section('content')
<div class="row"> 
    <h1 style="margin-left: 20px;">Registro de horario</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="card-title"><b>Formulario de registro</b></h2><br>
                Favor de llenar los datos
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Formulario -->
                    <div class="col-md-3">
                        <form action="{{url('/admin/horarios/create')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Doctor</label><b>*</b>
                                <select id="" name="doctor_id" class="form-control" required>
                                    @foreach($doctores as $doctore)
                                        <option value="{{$doctore->id}}">{{$doctore->nombres." ".$doctore->apellidos." - ".$doctore->especialidad}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Día</label><b>*</b>
                                <select id="" name="dia" class="form-control" required>
                                    <option value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miércoles">Miércoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>
                                    <option value="Sábado">Sábado</option>
                                    <option value="Domingo">Domingo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hora de inicio</label> <b>*</b>
                                <input type="time" value="{{old('hora_inicio')}}" name="hora_inicio" class="form-control" required>
                                @error('hora_inicio')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Hora final</label> <b>*</b>
                                <input type="time" value="{{old('hora_final')}}" name="hora_final" class="form-control" required>
                                @error('hora_final')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                            <hr>
                            <div class="form-group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                    <!-- Tabla de horarios -->
                    <div class="col-md-9">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Horario de atención</h3>
                            </div>
                            <div class="card-body">
                                <table style="text-align: center" class="table table-striped table-hover table-sm table-bordered">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>Hora/Día</th>
                                            <th>Lunes</th>
                                            <th>Martes</th>
                                            <th>Miércoles</th>
                                            <th>Jueves</th>
                                            <th>Viernes</th>
                                            <th>Sábado</th>
                                            <th>Domingo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $horas = [
                                                '08:00 - 09:00', '09:00 - 10:00', '10:00 - 11:00', '11:00 - 12:00',
                                                '12:00 - 13:00', '13:00 - 14:00', '14:00 - 15:00', '15:00 - 16:00',
                                                '16:00 - 17:00', '17:00 - 18:00', '18:00 - 19:00', '19:00 - 20:00'
                                            ];
                                            $diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                                        @endphp
                                        @foreach($horas as $hora)
                                            @php
                                                list($hora_inicio, $hora_final) = explode(' - ', $hora);
                                            @endphp
                                            <tr>
                                                <td>{{ $hora }}</td>
                                                @foreach($diasSemana as $dia)
                                                    @php
                                                        $nombre_doctor = '';
                                                        foreach ($horarios as $horario) {
                                                            $horario_inicio = strtotime($horario->hora_inicio);
                                                            $horario_final = strtotime($horario->hora_final);
                                                            $celda_inicio = strtotime($hora_inicio);
                                                            $celda_final = strtotime($hora_final);
                                                            
                                                            if (strcasecmp($horario->dia, $dia) == 0 && $horario_inicio <= $celda_inicio && $horario_final >= $celda_final) {
                                                                $nombre_doctor = $horario->doctor->nombres . ' ' . $horario->doctor->apellidos;
                                                                break;
                                                            }
                                                        }
                                                    @endphp
                                                    <td>{{ $nombre_doctor }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection