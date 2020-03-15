@extends('layouts.template')

@section('title', 'Editar producto')

@section('main')
<br><br>
    <h1>Formulario de modificación de un producto</h1>

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
        <input value="{{old('name', $Product->name)}}" class="form-control" type="text" name="name" class="form-control" require>
        <br>

        Precio:
        <input value="{{old('price', $Product->price)}}" type="text" name="price" class="form-control" require>
        <br>

        Stock:
        <input value="{{old('stock', $Product->stock)}}" type="number" name="stock" class="form-control" require>
        <br>

        Descripción:
        <input value="{{old('description', $Product->description)}}" type="textarea" name="description" class="form-control" require>
        <br>

        Imagen:
        <input class="from-control" type="file" name="image" require>
        <br> <br>

        Categoría:
        <select name="category_id" class="form-control">
            <option value="">Seleccione una categoría</option>
            @foreach ($Categories as $Category)

                @if(is_null(old('category_id')))

                    @if($Product->category_id == $Category->id)
                        <option value="{{$Category->id}}" selected>{{$Category->name}}</option>
                    @else
                        <option value="{{$Category->id}}">{{$Category->name}}</option>  
                    @endif

                @else

                    @if(old('category_id') == $Category->id)
                        <option value="{{$Category->id}}" selected>{{$Category->name}}</option>
                    @else
                        <option value="{{$Category->id}}">{{$Category->name}}</option>  
                    @endif

                @endif
            @endforeach
        </select>
        <br>

        Marca:
        <select name="mark_id" class="form-control">
            <option value="">Seleccione una marca</option>
            @foreach ($Marks as $Mark)

                @if(is_null(old('mark_id')))

                    @if($Product->mark_id == $Mark->id)
                        <option value="{{$Mark->id}}" selected>{{$Mark->name}}</option>
                    @else
                        <option value="{{$Mark->id}}">{{$Mark->name}}</option>  
                    @endif

                @else

                    @if(old('mark_id') == $Mark->id)
                        <option value="{{$Mark->id}}" selected>{{$Mark->name}}</option>
                    @else
                        <option value="{{$Mark->id}}">{{$Mark->name}}</option>  
                    @endif
                    
                @endif
            @endforeach
        </select>
        <br>

        <input class="btn btn-success" type="submit" value="Agregar">
        <input class="btn btn-danger" type="button" value="Volver" onclick="location.href='/adminProducts';">
        <br> <br>
    </form>

@endsection