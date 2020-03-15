@extends('layouts.master')
@section('content')

<body>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="title-left">
                            <h3>Categories</h3>
                        </div>



                        <div class="filter-sidebar-left">

@foreach ($Categories as $Category)

                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">


                               <div class="list-group-collapse sub-men">

                                    <a class="list-group-item list-group-item-action" href="{{route('products.list', ['Category'=> $Category->name])}}" aria-expanded="true" aria-controls="sub-men1">{{$Category->name}} <small class="text-muted">(50)</small>
								                              </a>


                                    {{-- <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action ">sub categoria <small class="text-muted">(5)</small></a>

                                        </div>

                                    </div> --}}

                                </div>


                                {{-- <li><a href=""</a>"</li> --}}


                            </div>
@endforeach
                        </div>


                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>Brand</h3>
                            </div>

                            <div class="brand-box">
                                <ul>
                                  @foreach ($Marks as $Mark)
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios1" value="Yes" type="radio">
                                            <label for="Radios1"> {{$Mark->name}} </label>
                                        </div>
                                    </li>

                                </ul>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">

                                    <strong>Price </strong>
									<a href="{{route ('products.list',['Category'=>request()->Category, 'sort' => 'low_high'])}}"> Low Price → High Price &nbsp &nbsp </a>

									<a href="{{route ('products.list',['Category'=>request()->Category, 'sort' => 'high_low'])}}">High Price → Low Price</a>



                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row product-categorie-box">

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">

                                    <h1 align="center">{{$CategoryName}}</h1>

                                    <div class="row">
                                      @forelse ($Products as $Product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <a href="products/{{$Product->id}}" class="product">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img class="img-fluid img-thumbnail" src="/product_img/{{$Product->image}}" alt="">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="{{url('/products/'.$Product->id)}}">Detail page </a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h3 class="product-name">{{$Product->name}}</h3>
                                                    <span class="product-price">${{$Product->price}}</span>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                      @empty
                                        <div style="text-align: left">No items found</div>


                                      @endforelse


                                    </div>
                                      <div class="spacer"></div>
                                    {{-- {{$Products->links()}} --}}
                                    {{$Products->appends(request()->input())->links()}}
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                      <h1 align="center">{{$CategoryName}}</h1>
                                        <div class="row">
                                          @forelse ($Products as $Product)
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                              <a href="products/{{$Product->id}}" class="product">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="new">New</p>
                                                        </div>
                                                        <img src="/product_img/{{$Product->image}}" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                  <h3 class="product-name">{{$Product->name}}</h3>
                                                  <span class="product-price">${{$Product->price}}</span>
                                                    <p>{{$Product->description}}</p>
                                                    <a class="btn hvr-hover" href="{{url('/products/'.$Product->id)}}">Detail page </a>

                                                </div>

                                            </div>
                                          @empty
                                            <div style="text-align: left">No items found</div>

                                          @endforelse


                                        </div>
                                        <div class="spacer"></div>

                                        </div>
                                        {{-- {{$Products->links()}} --}}
                                        {{$Products->appends(request()->input())->links()}}
                                    </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

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
