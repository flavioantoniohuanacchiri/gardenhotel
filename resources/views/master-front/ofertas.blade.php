@push('styles')
  <link href="css-front/ofertas.css" rel="stylesheet" type="text/css" media="all">
@endpush
@extends('layouts.master-public')
@section('content')
  <div class="container padding-off">
    <div class="text-center">
      <p class="text-light mb-0">Para nuestro futuros huéspedes les traemos</p>
      <h2 class="text-aparaj mt-0">LAS MEJORES OFERTAS</h2><img src="images/marco-centro.png">
    </div>
  </div>
  @foreach ($ofertas as $key => $oferta)
  <div class="{{$clases[$key]}}" style="background-image: url('../{{$oferta->path_imagen}}')">
    <div @if ($key % 2 == 0) class="pull-left bg-white position-box wow fadeInLeft " @else  class="pull-right bg-white position-box-right wow fadeInRight" @endif data-wow-offset="150" data-wow-delay="0.2s">
      <div class="box-body">
        <div class="green-light">
          <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="imgs-front/icons/hotel.svg"></div><br><span style="font-size: 14px;" class="pd-15 text-light">{{$oferta->titulo}}</span>
        </div>
        <div class="border-green">
          <ul class="text-light">
            <li>
              <div class="inlineflex">
                <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                <p style="font-size: 13px;">
                  {{$oferta->descripcion}}
                </p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <div class="container" style="padding: 20px 0;">
    <div class="text-center">
      <p class="text-light mb-0">Reserva 2 meses por adelantado y obtén 20% de descuento
        - Last Minute: 25 % de descuento llegando el mismo dia pero el ingreso es a partir de las 8:00 pm.
        - Pisco Sour de bienvenida gratis para todos nuestros huéspedes. El Pisco Sour es la bebida tradicional peruana en base a jugo de uva destilada, limón y azúcar.</p>
    </div>
  </div>

@endsection
@push('scripts')
  <script src="js-front/slick.js"></script>
  <script src="js-front/bootstrap.min.js"></script>
@endpush