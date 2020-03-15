@extends('layouts.template')

@section('title', 'Editar producto')

@section('main')
<br><br>
    <h1>Agregar imagenes de {{$ProductDetails->name}}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <table class="table table-stripped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Product id</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
    <tbody>


    @foreach ($productImages as $productImage)
      <tr>

                           <td>{{$productImage->id}}</td>

                           <td>{{$productImage->product_id}}</td>
                           <td>
                           <img src="{{url('product_img/'.$productImage->image)}}" alt="" style="width:80px;">
                           </td>
                              <td class="center">
                                 <div class="btn-group">
                                       {{-- <a href="" class="btn btn-success btn-sm">UPDATE </a> --}}

                                       <a href="{{url('delete-alt-image/'.$productImage->id)}}" class="btn btn-danger btn-sm">BORRAR </a>
                                 </div>
                              </td>
                           </tr>

    @endforeach
</tbody>
</table>

    <form action="{{url('addImages/'.$ProductDetails->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$ProductDetails->id}}">
        Imagen:
        <input class="from-control" type="file" name="image[]" require>

        <br>

        <input class="btn btn-success" type="submit" value="Add Image">
        <input class="btn btn-danger" type="button" value="Volver" onclick="location.href='/adminProducts';">
        <br> <br>
    </form>

@endsection
