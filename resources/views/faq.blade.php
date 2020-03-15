@extends('layouts.template')

@section('title', 'FAQ')

@section('css')
    {{ '/css/faq.css' }}
@endsection

@section('main')
<div id="main-title">
    <h1>Preguntas Frecuentes</h1>
</div>

<article class="nosotros">

    <h2 class="subtitle">Sobre nosotros</h2>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        ¿Quienes somos?
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    Somos un grupo de estudiantes de Digital House, que surgió con el propósito de crear una página destinada al mercado.
                </div>
            </div>
        </div>
</article>
<article class="servicios">
    <h2 class="subtitle">Nuestro servicio</h2>
    <div class="accordion" id="accordionExample">

        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Cómo utlizo el servicio online?
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                 Tratamos de proveer una experiencia enriquecedora y totalmente placentera a la hora de hacer compras en línea. Para ello, disponemos de un amplio repositorio de productos para ofrecerle a nuestros clientes. Las compras se pueden efectuar en efectivo ya sea acercándose a las tiendas de comercio más cercanas (RapiPago, PagoFacil), o por debito/credito.
                </div>
            </div>
        </div>
        <h2 class="subtitle">Cómo registrarse</h2>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Quiero comprar, ¿cómo me registro?
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
           Para ser parte de esta comunidad, solo precisas introducir tus datos personales, y una imagen a elección, que servirá para reconocerte. Para ello, dirigirse hacia el extremo derecho superior y presionar sobre el botón que dice “Crear Cuenta”.
                </div>
            </div>
        </div>
    </div>
</article>

<article class="cuenta">
    <h2 class="subtitle">Mi cuenta</h2>
    <div class="accordion" id="accordionExample">

        <div class="card">
            <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        ¿Cómo puedo acceder a mi cuenta?
                    </button>
                </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    Para acceder a una cuenta, se debe ingresar las credenciales utilizadas por el usuario a la hora de crear la cuenta. Estos datos, de pueden modificar entrando en la sección del perfil.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        No puedo acceder a mi cuenta, ¿qué hago?
                    </button>
                </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    En el caso de toparse con un error a la hora de ingresar a la cuenta personal, el problema puede asociarse con un ingreso erróneo de credenciales. Si este no es el caso, seleccionar el botón que dice Olvide Contraseña, para actualizar y recuperar sus datos.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingSix">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Mi cuenta está bloqueada, ¿cómo la habilito?
                    </button>
                </h2>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body">
                    En el caso de tener la cuenta bloqueada, le pedimos por favor que se comunique con nosotros mediante correo electrónico, para poder encontrar una solución al problema y corroborar que es un cliente apto para pertenecer de esta comunidad.
                </div>
            </div>
        </div>
    </div>
</article>
<article class="password">
    <h2 class="subtitle">Contraseña</h2>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingSeven">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        Olvidé mi contraseña, ¿cómo creo una nueva?
                    </button>
                </h2>
            </div>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                <div class="card-body">
                    Si usted se ha olvidado, o perdio su contraseña, cuenta con la posibilidad de recibir un email y actualizarla. Para ello, presione en el botón debajo de ingresar a mi cuenta e ingrese su dirección de correo electrónico.
                </div>
            </div>
        </div>
    </div>
</article>
<article>
    <h2 class="subtitle">Medios de pago</h2>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingEight">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        ¿Cuáles son los medios de pago habilitados para pagar?
                    </button>
                </h2>
            </div>
            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                <div class="card-body">
                    Por el momento, contamos solamente con pagos en efectivos en el local, pagos a través de transferencias bancarias, por tarjeta de credito y debito y por último, a través de depósitos en RapiPago o PagoFacil. Estamos desarrollandonos para conseguir nuevas medidas y satisfacer sus necesidades.
                </div>
            </div>
        </div>
        <br>
    </div>
</article>



@endsection
