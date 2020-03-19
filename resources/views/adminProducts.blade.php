@extends('layouts.master')

{{-- @section('title', 'DHShop - adminProducts') --}}

@section('content')
    <h1>Panel de administración de productos</h1>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

    <table class="table table-stripped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Marca</th>
                <th>Categoría</th>
                <th colspan="2">
                <a href="addProduct" class="btn btn-dark">
                    agregar
                </a>
                </th>
            </tr>
        </thead>
    <tbody>

        @foreach($Products as $Product)

            <tr>
                <td>{{ $Product->id }}</td>
                <td>{{ $Product->name }}</td>
                <td>${{ $Product->price }}</td>
                <td>{{ $Product->stock }}</td>
                <td>{{ $Product->description }}</td>
                <td><img class="img-fluid img-thumbnail main-image" src="product_img/{{$Product->image}}" alt=""></td>
                <td>{{ $Product->mark->name }}</td>
                <td>{{ $Product->category->name }}</td>
                <td><a href="editProduct/{{ $Product->id }}" class="btn btn-outline-secondary">modificar</a></td>
                <td><a href="deleteProduct/{{ $Product->id }}" class="btn btn-outline-secondary">eliminar</a></td>
                <td><a href="addImages/{{ $Product->id }}" class="btn btn-outline-secondary"> Imagenes</a></td>
            </tr>
        @endforeach



    </tbody>
    </table>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>
@endsection
