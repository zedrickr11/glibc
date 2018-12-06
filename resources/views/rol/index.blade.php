@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="car-header">
                Listado de Roles
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Condicion</th>
                            <th>Display Name</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $rol) 
                        <tr>
                            <td>{{$rol->nombre}}</td>
                            <td>{{$rol->descripcion}}</td>
                            <td>{{$rol->condicion}}</td>
                            <td>{{$rol->display_name}}</td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection