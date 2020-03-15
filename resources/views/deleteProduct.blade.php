@extends('layouts.template')

@section('title', 'Eliminar producto')

@section('main')

<br>
<h1>Eliminar producto</h1>
<form action="" method="POST">
    @csrf
    ¿Seguro desea eliminar el siguiente producto: {{$Product->name}} ? <br>
    <input class="btn btn-success" type="submit" value="Eliminar">
    <a class="btn btn-danger" type="button" href='/adminProducts'>Volver</a>
</form>

@endsection