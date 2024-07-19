@extends('layouts.admin')

@section('content')
<div class="row">
    <h1 style="margin-left: 20px;">Listado de horarios</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Horarios registrados</h3>
                <div class="card-tools">
                    <a href="{{url('admin/horarios/create')}}" class="btn btn-primary" >
                        Registrar horario
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th style= "text-align: center">No.</th>
                        <th style= "text-align: center">Doctor</th>
                        <th style= "text-align: center">Especialidad</th>
                        <th style= "text-align: center">Día de atención</th>
                        <th style= "text-align: center">Hora de inicio</th>
                        <th style= "text-align: center">Hora final</th>
                        <th style= "text-align: center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $contador = 1; ?>
                    @foreach($horarios as $horario)
                        <tr>
                            <td style= "text-align: center">{{ $contador++ }}</td>
                            <td>{{ $horario->doctor->nombres}} {{$horario->doctor->apellidos}}</td>
                            <td>{{ $horario->doctor->especialidad }}</td>
                            <td>{{ $horario->dia}}</td>
                            <td style="text-align: center">
                                {{$horario->hora_inicio}}
                            </td>
                            <td style="text-align: center">
                                {{$horario->hora_final}}
                            </td>
                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/horarios/'.$horario->id)}}" type="button" class="btn btn-info btn-sm" ><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="{{url('admin/horarios/'.$horario->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <script> 
                        $(function () {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Horarios",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                                    "infoFiltered": "(Filtrado de _MAX_ total Horarios)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Horarios",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscador:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                                "responsive": true, "lengthChange": true, "autoWidth": false,
                                buttons: [
                                    {
                                        extend: 'colvis',
                                        text: 'Visor de columnas',
                                        collectionLayout: 'fixed three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                </script>

            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
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
@endsection
