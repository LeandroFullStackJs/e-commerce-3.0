@extends('layouts.template')

@section('title', 'Agregar nueva categoria')

@section('main')
<br><br>
    <h1>Formulario de alta de una categoría</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action="" method="post">
            @csrf
            Categoría:
            <br>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            <br>
            <input class="btn btn-success" type="submit" value="Agregar">
            <input class="btn btn-danger" type="button" value="Volver" onclick="location.href='/adminCategories';">
        </form>

@endsection