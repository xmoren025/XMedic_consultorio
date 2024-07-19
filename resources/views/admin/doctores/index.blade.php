@extends('layouts.admin')

@section('content')
<div class="row">
    <h1 style="margin-left: 20px;">Listado de doctores</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Doctores registrados</h3>
                <div class="card-tools">
                    <a href="{{url('admin/doctores/create')}}" class="btn btn-primary" >
                        Registrar doctor
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th style= "text-align: center">id</th>
                        <th style= "text-align: center">Nombre</th>
                        <th style= "text-align: center">Teléfono</th>
                        <th style= "text-align: center">Licencia médica</th>
                        <th style= "text-align: center">Especialidad</th>
                        <th style= "text-align: center">email</th>
                        <th style= "text-align: center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $contador = 1; ?>
                    @foreach($doctores as $doctore)
                        <tr>
                            <td style= "text-align: center">{{ $contador++ }}</td>
                            <td>{{ $doctore->nombres}} {{$doctore->apellidos}}</td>
                            <td>{{ $doctore->celular }}</td>
                            <td>{{ $doctore->licencia_medica}}</td>
                            <td>{{ $doctore->especialidad}}</td>
                            <td>{{ $doctore->user->email}}</td>
                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/doctores/'.$doctore->id)}}" type="button" class="btn btn-info btn-sm" ><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{url('admin/doctores/'.$doctore->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="{{url('admin/doctores/'.$doctore->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
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
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Doctores",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Doctores",
                                    "infoFiltered": "(Filtrado de _MAX_ total Doctores)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Doctores",
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
