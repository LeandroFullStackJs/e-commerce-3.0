@extends('layouts.template')

@section('title', 'Panel de administracion')

@section('main')
    <h1>Administración</h1>

    <div class="list-group">
        <a class="list-group-item list-group-item-action" href="adminMarks">
            Administración de Marcas
        </a>
        <a class="list-group-item list-group-item-action" href="adminCategories">
            Administración de Categorías
        </a>
        <a class="list-group-item list-group-item-action" href="adminProducts">
            Administración de Productos
        </a>
        <a class="list-group-item list-group-item-action" href="adminCustomers">
            Administración de Usuarios
        </a>
    </div>

    <br>

    <a class="py-2" href="adminLogOut">Cerrar sesion de administrador</a>
@endsection