<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/header-footer.css">
    <link rel="stylesheet" href='@yield("css")'>
    </head>

    <body>
      @include('sweetalert::alert')

        <header>
            <section class='logo-usuario'>
            <article class='logo'>
                <a href='/'><img src='/img/logo-dh.PNG' alt=''></a>
            </article>
            <article class='usuario-acciones'>
                @if(Auth::user() == null)
                    <a href='/register' id='registrarme'>Crear cuenta</a>
                    <a href='/login' id='ingresar'>Ingresar</a>
                @else
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </article>
            </section>
            <hr>
            <nav id='nav' class='navbar navbar-expand-lg navbar-light '>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
                aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>

            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav mr-auto'>
                <li class='nav-item active'>
                    <a class='nav-link' href='/'>Home <span class='sr-only'>(current)</span></a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='/products'>Productos</a>
                </li>
                <li class='nav-item '>
                    <a class='nav-link' href='/contact'>Contacto</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='/faq'>Ayuda</a>
                </li>

                @if(Auth::user() != null)
                <li class='nav-item'>
                    <a class='nav-link' href='/profile'>Perfil</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='/cart'>Carrito</a>
                </li>
                @endif

                </ul>
                <form class='form-inline my-2 my-lg-0'>
                <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
                <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Buscar</button>
                </form>
            </div>
            </nav>
            <hr>
        </header>

        <div class="container-fluid">

            <main>

                @yield('main')

            </main>

        </div>

        <footer>
            <section class="logo">
            <h1>DHShop</h1>
            </section>
            <section class="footer-nav">
            <ul>
                <li><a href="index">Home</a></li>
                <li><a href="products">Productos</a></li>
                <li><a href="contact">Contacto</a></li>
                <li><a href="faq">Ayuda</a></li>
            </ul>
            </section>
        </footer>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    </body>

</html>
