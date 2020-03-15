@extends('layouts.template')

@section('title', 'DHShop - adminCustomers')

@section('main')

<br>
<h1>Eliminar usuario</h1>
<form action="" method="POST">
    @csrf
    ¿Seguro desea eliminar el siguiente usuario: {{$Customer->first_name . " " . $Customer->last_name . " (id: " . $Customer->id . ")"}} ? <br>
    <input class="btn btn-success" type="submit" value="Eliminar">
    <a class="btn btn-danger" type="button" href='/adminCustomers'>Volver</a>
</form>

@endsection