<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register-css.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <title>Registrate</title>
</head>

<body>
    <div class="container-fluid">

        <main>

            <br>
            <section id="register-form">
                <div class="main-title">
                    <h1>Registrarse</h1>
                </div>
                <div class="logo-company">
                    <a href="/"><img src="/img/acba-logo.png" alt=""></a>
                </div>




                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Nombre</label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

                        @error('first_name')
                        
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password" autofocus>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="password_confirmation" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="image">Foto de perfil</label> <br>
                        <input name="image" type="file" id="image">
                        @error('image')
                        <span class="invalid-feedback" style="display:block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
 
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" autocomplete="dni" autofocus>

                        @error('dni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
 
                    <div class="form-group">
                        <label for="birthdate">Fecha de nacimiento</label>
                        <input value="{{ old('birthdate') }}" name="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate">
                        @error('birthdate')
                        <span class="invalid-feedback" style="display:block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-6 column">
                            <button type="submit" class="btn btn-dark">Enviar</button>
                        </div>
                    </div>

                </form>

                <div class="btn-social-network">
                    <hr>
                    <span>O</span>
                    <hr><br>
                </div>
                <div class="btn-social-network">
                    <a href="https://gmail.com"><img src="img/gmail.svg" alt="Gmail"></a>
                    <a href="https://facebook.com"><img src="img/facebook.svg" alt="Facebook"></a>
                    <a href="https://twitter.com"><img src="img/twitter.svg" alt="Twitter"></a>
                </div>

                <p>¿Ya tiene una cuenta? <a href="login">Ingrese</a></p>

            </section>
            <br>
        </main>



        <aside>
            
        </aside>

        <footer>
            
        </footer>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>