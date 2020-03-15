@extends('layouts.template')

@section('title', 'Eliminar marca')

@section('main')

<br>
<h1>Eliminar marca</h1>
<form action="" method="POST">
    @csrf
    ¿Seguro desea eliminar la siguiente marca: {{$Mark->name}} ? <br>
    <input class="btn btn-success" type="submit" value="Eliminar">
    <a class="btn btn-danger" type="button" href='/adminMarks'>Volver</a>
</form>

@endsection