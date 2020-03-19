@extends('layouts.master')

{{-- @section('title', 'Editar categoria') --}}

@section('content')
<br><br>
    <h1>Formulario de modificación de una categoría</h1>

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
            <input type="text" name="name" class="form-control" value="{{old('name', $Category->name)}}">
            <br>
            <input class="btn btn-success" type="submit" value="Modificar">
            <a class="btn btn-danger" type="button" href='/adminCategories'>Volver</a>
        </form>

@endsection
