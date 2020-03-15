@extends('layouts.template')

@section('title', 'Contacto')

@section('css')
    {{ '/css/contact.css' }}
@endsection

@section('main')
<form class="contact" action="">
    <h1>Contactate con nosotros</h1>


    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><b>Nombre</b></span>
      </div>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>

    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><b>Correo electrónico</b></span>
      </div>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>

    <p><b>Mensaje</b></p>

    <textarea class="form-control" aria-label="With textarea"></textarea>

    <button class="btn btn-primary" type="submit">Enviar</button>
  </form>

  <div class="info">
    <p><b>También podés contactarnos por:</b></p><br>
    <ul>
      <li><i class="fas fa-envelope"></i>
        acba@acba.com</li>
      <li><i class="fab fa-whatsapp"></i>
        (011) 15-1234-5678</li>
      <li><i class="fas fa-phone"></i>
        +54 9 11 4234-5678</li>

    </ul>

  </div>

@endsection