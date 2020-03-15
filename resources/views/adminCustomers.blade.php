@extends('layouts.template')

@section('title', 'Administrador de usuarios')

@section('main')
    <h1>Panel de administración de usuarios</h1>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

    <table class="table table-stripped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>imagen de perfil</th>
                <th>Fecha de nacimiento</th>
                <th>Telefono</th>
                <th>Dirección</th>
                <th colspan="2"></th>
              </tr>
        </thead>
    <tbody>
        
        @foreach($Customers as $Customer)

            <tr>
                <td>{{ $Customer->id }}</td>
                <td>{{ $Customer->first_name }}</td>
                <td>{{ $Customer->last_name }}</td>
                <td>{{ $Customer->email }}</td>
                <td><img class="img-fluid img-thumbnail main-image" src="user_img/{{$Customer->image}}" alt=""></td>
                <td>{{ $Customer->birthdate }}</td>
                <td>{{ $Customer->phone }}</td>
                <td>{{ $Customer->address }}</td>
                <td><a href="deleteCustomer/{{ $Customer->id }}" class="btn btn-outline-secondary">Eliminar</a></td>
            </tr>

        @endforeach
        
    </tbody>
    </table>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>
@endsection