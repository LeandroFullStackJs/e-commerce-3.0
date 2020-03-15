
<!-- Start Main Top -->
<div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 10% de descuento amego
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> pero te cobramos un 30% mas
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">

						<option>$ USD</option>
                        <option>$ Pesos</option>

					</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Llamanos :- <a href="#"> +11 900 800 100</a></p>
                    </div>


            </section>
                    <div class="our-link">
                        <ul>
                        @if(Auth::user() == null)
                        <li> <a href='/register' id='registrarme'>Crear cuenta</a> </li>
                        <li> <a href='/login' id='ingresar'>Ingresar</a> </li>
                @else
                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a> </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
                            <li><a href="/profile">Mi usuario</a></li>
                            <li><a href="/contact-us"> Contactanos </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="/"><img src="{{asset('front_assets/images/logo.png')}}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Product</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-3">
                                            <a href="/products" class="title">Top</a>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="/shop">Jackets</a></li>
                                                    <li><a href="/shop">Shirts</a></li>
                                                    <li><a href="/shop">Sweaters & Cardigans</a></li>
                                                    <li><a href="/shop">T-shirts</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            <a href="/products" class="title">Bottom</a>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="/shop">Swimwear</a></li>
                                                    <li><a href="/shop">Skirts</a></li>
                                                    <li><a href="/shop">Jeans</a></li>
                                                    <li><a href="/shop">Trousers</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            <a href="/products" class="title">Clothing</a>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="/shop">Top Wear</a></li>
                                                    <li><a href="/shop">Party wear</a></li>
                                                    <li><a href="/shop">Bottom Wear</a></li>
                                                    <li><a href="/shop">Indian Wear</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-menu col-md-3">
                                            <a href="/products" class="title">Accessories</a>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="/shop">Bags</a></li>
                                                    <li><a href="/shop">Sunglasses</a></li>
                                                    <li><a href="/shop">Fragrances</a></li>
                                                    <li><a href="/shop">Wallets</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="/cart">Cart</a></li>
                                <li><a href="/checkout">Checkout</a></li>
                                <li><a href="/profile">My Account</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/contact-us">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="{{asset('front_assets/images/img-pro-01.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{asset('front_assets/images/img-pro-02.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{asset('front_assets/images/img-pro-03.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->
