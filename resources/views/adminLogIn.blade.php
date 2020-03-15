@extends('layouts.template')

@section('title', 'Ingreso de administradores')

@section('main')

<h1>Ingreso de administradores</h1>

<form action="" method="post">

    @if ($errors->any())
    <div class="alert alert-danger text-left">
        <ul class="text-left">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @csrf
    Usuario:
    <input value="{{old('user')}}" class="form-control" type="text" name="user" class="form-control" require>
    <br>

    Contraseña:
    <input type="password" name="password" class="form-control" require>
    <br>

    <input type="submit" value="Entrar">
</form>

@endsection