@extends('layouts.template')

@section('title', 'Agregar un producto')

@section('main')
<br><br>
    <h1>Formulario de alta de un producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        Nombre:
        <input value="{{old('name')}}" class="form-control" type="text" name="name" class="form-control" require>
        <br>

        Precio:
        <input value="{{old('price')}}" type="text" name="price" class="form-control" require>
        <br>

        Stock:
        <input value="{{old('stock')}}" type="number" name="stock" class="form-control" require>
        <br>

        Descripción:
        <input value="{{old('description')}}" type="textarea" name="description" class="form-control" require>
        <br>

        Imagen:
        <input class="from-control" type="file" name="image" require>
        <br> <br>

        Categoría:
        <select name="category_id" class="form-control">
            <option value="">Seleccione una categoría</option>
            @foreach ($Categories as $Category)
                @if(old('category_id') == $Category->id)
                    <option value="{{$Category->id}}" selected>{{$Category->name}}</option>
                @else
                    <option value="{{$Category->id}}">{{$Category->name}}</option>  
                @endif
            @endforeach
        </select>
        <br>

        Marca:
        <select name="mark_id" class="form-control">
            <option value="">Seleccione una Marca</option>
            @foreach ($Marks as $Mark)
                @if(old('mark_id') == $Mark->id)
                    <option value="{{$Mark->id}}" selected>{{$Mark->name}}</option>
                @else
                    <option value="{{$Mark->id}}">{{$Mark->name}}</option>  
                @endif
            @endforeach
        </select>
        <br>

        <input class="btn btn-success" type="submit" value="Agregar">
        <input class="btn btn-danger" type="button" value="Volver" onclick="location.href='/adminProducts';">
        <br> <br>
    </form>

@endsection