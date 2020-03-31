
@extends('layouts.master')
@section('content')
    @section('css')
    {{ '/css/profile.css' }}
    @endsection

    <body>
    <!-- Start All Title Box -->
    <div class="all-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>My Account</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Shop</a></li>
                            <li class="breadcrumb-item active">My Account</li>
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
                    <br>
                <section class="user row">
                    <article class="user-info col-12 row">
                        <form class="col-12 col-md-8 row" action="" method="post" enctype="multipart/form-data">
                            <fieldset class="row col-12">
                                <h2>Datos de mi cuenta</h2>
                                @csrf
                                <input type="hidden" name="id" value="{{$User->id}}">
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email', $User->email)}}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Cambiar contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="**********">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group re-pass">
                                    <label for="repassword">Reingrese contraseña</label>
                                    <input type="password" id="repassword" name="password_confirmation" class="form-control" placeholder="**********">
                                </div>
                                <div class="form-group">
                                    <label for="img">Foto de perfil</label> <br>
                                    <input name="image" type="file" id="img">
                                </div>
                                <h2>Datos personales</h2>
                                <div class="form-group">
                                    <label for="first_name">Nombre</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name', $User->first_name)}}">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Apellido</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{old('last_name', $User->last_name)}}">
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dni">Documento</label>
                                    <input type="text" id="dni" name="dni" class="form-control @error('dni') is-invalid @enderror" value="{{old('dni', $User->dni)}}">
                                        @error('dni')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="birthdate">Fecha de nacimiento</label>
                                    <input type="date" id="birthdate" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{old('birthdate', $User->birthdate)}}">
                                        @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefono</label>
                                    <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone', $User->phone)}}">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Direccion</label>
                                    <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address', $User->address)}}">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </fieldset>
                            <div class="button-container col-12">
                                <button type="submit" id="btn-edit" class="btn btn-dark">Guardar Datos</button>
                            </div>
                        </form>
                        <div class="col-12 col-md-4 imgAndHistory-container">
                            <img class="img-fluid img-thumbnail" id="profileimg" src="user_img/{{$User->image}}" alt="">
                            <br>
                            <br>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </article>
                </section>
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
