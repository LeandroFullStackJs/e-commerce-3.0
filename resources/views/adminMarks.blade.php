@extends('layouts.template')

@section('title', 'Administrador de Marcas')

@section('main')
    <h1>Panel de administración de Marcas</h1>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver al panel</a>

    <table class="table table-stripped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
        <th>id</th>
        <th>Marca</th>
        <th colspan="2">
            <a href="addMark" class="btn btn-light">
            Agregar nueva marca
            </a>
        </th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($Marks as $Mark)

            <tr>
                <td>{{ $Mark->id }}</td>
                <td>{{ $Mark->name }}</td>
                <td><a href="editMark/{{ $Mark->id }}" class="btn btn-outline-secondary">Modificar</a></td>
                <td><a href="deleteMark/{{ $Mark->id }}" class="btn btn-outline-secondary">Eliminar</a></td>
            </tr>
        @endforeach

    </tbody>
    </table>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver al panel</a>
@endsection