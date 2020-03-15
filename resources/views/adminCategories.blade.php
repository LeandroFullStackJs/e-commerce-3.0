@extends('layouts.template')

@section('title', 'Administrador de Categorias')

@section('main')
    <h1>Panel de administración de categorías</h1>

    <a href="/admin" class="btn btn-outline-secondary m-3">Volver al panel</a>

    <table class="table table-stripped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
        <th>id</th>
        <th>Categoría</th>
        <th colspan="2">
            <a href="addCategory" class="btn btn-light">
            Agregar nueva categoria
            </a>
        </th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($Categories as $Category)

            <tr>
                <td>{{ $Category->id }}</td>
                <td>{{ $Category->name }}</td>
                <td><a href="editCategory/{{ $Category->id }}" class="btn btn-outline-secondary">Modificar</a></td>
                <td><a href="deleteCategory/{{ $Category->id }}" class="btn btn-outline-secondary">Eliminar</a></td>
            </tr>
        @endforeach



    </tbody>
    </table>

    <a href="/admin" class="btn btn-outline-secondary m-3">Volver al panel</a>
@endsection