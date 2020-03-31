@extends('layouts.master')

@section('title', 'Carrito')


@section('content')
 <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Products as $Product)
                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="products/{{$Product->id}}">
                                                <img class="img-fluid" src="product_img/{{$Product->image}}" alt="" />
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="products/{{$Product->id}}">
                                                {{$Product->name}}
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p>{{$Product->price}}</p>
                                        </td>
                                        <td class="quantity-box">
                                            <form method="post" action="/modifyProductQuantity">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$Product->id}}"></input>
                                                <input type="number" name="quantity" min="1" max="50" value="@if(old('product_id') == $Product->id){{old('product_id')}}@else{{$Product->pivot->quantity}}@endif">
                                                <div class="update-box">
                                                    <input type="submit" value="modificar">
                                                </div>
                                            </form>
                                        </td>
                                        <td class="total-pr">
                                            <p>{{$Product->price * $Product->pivot->quantity }}</p>
                                        </td>
                                        <td class="remove-pr">
                                            <form method="post" action="/removeProduct">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$Product->id}}"></input>
                                                <button type="submit" class="btn btn-danger">Quitar</button><br>
                                            </form>
                                        </td>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="No hay cupones porque es Argentina" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4> sub total </h4>
                            <div class="ml-auto font-weight-bold"> {{$totalPrice}} </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> {{$totalPrice}}  </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box">
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="checkout" value="{{$totalPrice}}"></input>
                        <a href="/checkout"class="ml-auto btn hvr-hover">Proceder a pagar</a>
                        @if ($errors->any())
                            <div class="alert alert-danger text-left"> No hay stock suficiente de:
                                <ul class="text-left">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
@endsection
