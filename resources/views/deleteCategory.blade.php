@extends('layouts.template')

@section('title', 'Eliminar categoria')

@section('main')

<br>
<h1>Eliminar categoría</h1>
<form action="" method="POST">
    @csrf
    ¿Seguro desea eliminar la siguiente categoría: {{$Category->name}} ? <br>
    <input class="btn btn-success" type="submit" value="Eliminar">
    <a class="btn btn-danger" type="button" href='/adminCategories'>Volver</a>
</form>

@endsection