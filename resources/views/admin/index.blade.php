@extends('layouts.admin')

@section('content')
<div class= "row"> <h1 style="margin-left: 20px;"> Panel principal</h1></div>
<hr>
<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="icon">
                <i class="ion fas bi bi-person-vcard"></i>
            </div>
            <div class="inner">
                <h3>{{$total_usuarios}}</h3>
                <p>Usuarios</p>
            </div>
            
            <a href="{{url('admin/usuarios')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">

        <div class="small-box bg-primary">
            <div class="icon">
            <i class="ion fas bi bi-person-badge"></i>
            </div>
            <div class="inner">
                <h3>{{$total_doctores}}</h3>
                <p>Doctores</p>
            </div>
            
            <a href="{{url('admin/doctores')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">

        <div class="small-box bg-secondary">
            <div class="icon">
                <i class="ion fas bi bi-person-circle"></i>
            </div>
            <div class="inner">
                <h3>{{$total_pacientes}}</h3>
                <p>Pacientes</p>
            </div>
            
            <a href="{{url('admin/pacientes')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
@endsection