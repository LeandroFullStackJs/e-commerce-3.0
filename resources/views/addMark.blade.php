@extends('layouts.master')

{{-- @section('title', 'Agregar nueva marca') --}}

@section('content')
<br><br>
    <h1>Formulario de alta de una marca</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action="addMark" method="post">
            @csrf
            Marca:
            <br>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            <br>
            <input class="btn btn-success" type="submit" value="Agregar">
            <input class="btn btn-danger" type="button" value="Volver" onclick="location.href='/adminMarks';">
        </form>

@endsection
