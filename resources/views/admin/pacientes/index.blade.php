@extends('layouts.admin')

@section('content')
<div class="row">
    <h1 style="margin-left: 20px;">Listado de pacientes</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Pacientes registrados</h3>
                <div class="card-tools">
                    <a href="{{url('admin/pacientes/create')}}" class="btn btn-primary" >
                        Registrar paciente
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th style= "text-align: center">id</th>
                        <th style= "text-align: center">Nombre</th>
                        <th style= "text-align: center">CURP</th>
                        <th style= "text-align: center">Fecha de nacimiento</th>
                        <th style= "text-align: center">Sexo</th>
                        <th style= "text-align: center">Teléfono</th>
                        <th style= "text-align: center">Contacto de emergencia</th>
                        <th style= "text-align: center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $contador = 1; ?>
                    @foreach($pacientes as $paciente)
                        <tr>
                            <td style= "text-align: center">{{ $contador++ }}</td>
                            <td>{{ $paciente->nombres}} {{$paciente->apellidos}}</td>
                            <td>{{ $paciente->curp }}</td>
                            <td>{{ $paciente->fecha_nacimiento }}</td>
                            <td>{{ $paciente->sexo }}</td>
                            <td>{{ $paciente->celular}}</td>
                            <td>{{ $paciente->contacto_emergencia}}</td>
                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/pacientes/'.$paciente->id)}}" type="button" class="btn btn-info btn-sm" ><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{url('admin/pacientes/'.$paciente->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="{{url('admin/pacientes/'.$paciente->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
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
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Pacientes",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Pacientes",
                                    "infoFiltered": "(Filtrado de _MAX_ total Pacientes)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Pacientes",
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
                                buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    },{
                                        extend: 'csv'
                                    },{
                                        extend: 'excel'
                                    },{
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }
                                    ]
                                },
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
@endsection
