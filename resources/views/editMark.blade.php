@extends('layouts.template')

@section('title', 'Editar marca')

@section('main')
<br><br>
    <h1>Formulario de modificación de una marca</h1>

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
            Marca:
            <br>
            <input type="text" name="name" class="form-control" value="{{old('name', $Mark->name)}}">
            <br>
            <input class="btn btn-success" type="submit" value="Modificar">
            <a class="btn btn-danger" type="button" href='/adminMarks'>Volver</a>
        </form>

@endsection