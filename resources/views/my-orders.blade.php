@extends('layouts.master')
@section('title' ,'My Orders')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/my-order.css') }}" />
    <body>
        <!-- Start All Title Box -->
        <div class="all-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>My Orders</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Shop</a></li>
                            <li class="breadcrumb-item active">My Orders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Title Box -->

        <!-- Start My Account  -->
        <div class="my-account-box-main">
            <div class="container">
                <div class="my-account-page">
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="account-box">
                                <div class="service-box">
                                    <div class="service-icon">
                                        <a href="/my-orders"> <i class="fa fa-gift"></i> </a>
                                    </div>
                                    <div class="service-desc">
                                        <h4>Your Orders</h4>
                                        <p>Track, return, or buy things again</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="account-box">
                                <div class="service-box">
                                    <div class="service-icon">
                                        <a href="/profile"><i class="fa fa-lock"></i> </a>
                                    </div>
                                    <div class="service-desc">
                                        <h4>Login &amp; security</h4>
                                        <p>Edit login, name, and mobile number</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="products-section my-orders container">
                        <div class="my-profile">
                            <div class="products-header">
                                <h1 class="stylish-heading">My Orders</h1>
                            </div>
                            <div>
                                @foreach ($orders as $order)
                                    <div class="order-container">
                                        <div class="order-header">
                                            <div class="order-header-items">
                                                <div>
                                                    <div class="uppercase font-bold">Order Placed</div>
                                                    <div>{{$order->created_at}}</div>
                                                </div>
                                                <div>
                                                    <div class="uppercase font-bold">Order ID</div>
                                                    <div>{{ $order->id }}</div>
                                                </div><div>
                                                    <div class="uppercase font-bold">Total</div>
                                                    <div>{{$order->billing_total}}</div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="order-header-items">
                                                    <div><a href="{{ route('orders.show', $order->id) }}">Order Details</a></div>
                                                    <div>|</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-products">
                                            @foreach ($order->products as $product)
                                                <div class="order-product-item">
                                                    <div>
                                                        <img src="{{('/product_img/'.$product->image)}}" alt="Product Image">
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <a href="products/{{$product->id}}">{{ $product->name }}</a>
                                                        </div>
                                                        <div>{{$product->price}}</div>
                                                        <div>Quantity: {{ $product->pivot->quantity }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div> <!-- end order-container -->
                                @endforeach
                            </div>
                            <div class="spacer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End My Account -->

        <!-- Start Instagram Feed  -->
        <div class="instagram-box">
            <div class="main-instagram owl-carousel owl-theme">
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="{{asset('front_assets/images/instagram-img-01.jpg')}}" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="{{asset('front_assets/images/instagram-img-02.jpg')}}" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="{{asset('front_assets/images/instagram-img-03.jpg')}}" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="{{asset('front_assets/images/instagram-img-04.jpg')}}" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="{{asset('front_assets/images/instagram-img-05.jpg')}}" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="{{asset('front_assets/images/instagram-img-06.jpg')}}" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="{{asset('front_assets/images/instagram-img-07.jpg')}}" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="{{asset('front_assets/images/instagram-img-08.jpg')}}" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="{{asset('front_assets/images/instagram-img-09.jpg')}}" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="{{asset('front_assets/images/instagram-img-05.jpg')}}" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Instagram Feed  -->
    </body>
@endsection
