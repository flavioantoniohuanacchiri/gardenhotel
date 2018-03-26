@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css-front/slidzomm.css') }}" property="stylesheet">
@endpush
@extends('layouts.master-public')
@section('content')

  <div style="position: relative;">
    <section id="inicio" class="pantallazo" >
      <div id="main">
        <div id="inicio_banner" class="fila contenido">
          <div class="owl-carousel">
            @foreach ($banners as $banner)
            <div class="item">
              <img src="{{ asset($banner->path_imagen) }}" width="1500" height="800">
              <div class="container-fluid">
                <div class="enriquecido">
                  <h2>
                    @if($idioma == 'es')
                      <span style="font-size:30px"><strong>{{ $banner->titulo }}</strong></span>
                      <span style="font-size:20px; text-align: center;">{{ $banner->descripcion }}</span>
                    @else
                      <span style="font-size:30px"><strong>{{ $banner->titulo_en }}</strong></span>
                      <span style="font-size:20px; text-align: center;">{{ $banner->descripcion_en }}</span>
                    @endif
                  </h2>
                </div>
              </div>
            </div>
            @endforeach
            </div>
          </div>
        </div>
    </section>
  </div>
  <section class="section" id="section1">
    <div class="section options" >
      <div class="container">
        <div class="text-center">
          <div class="sectio-title">
            
            <h2 class="mg-0 color-green wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s">
              @if($idioma == 'es')
                OFRECEMOS CALIDAD
              @else
                WE OFFER QUALITY SERVICES
              @endif
            </h2>
            <img src="{{ asset('imgs-front/marco-centro.png') }}">
            <br><br>
            <p class="wow fadeInUp" data-wow-offset="150" style="font-size: 22px; color: #0E5D36">
              @if($idioma == 'es')
                Nuestra privilegiada ubicación, confort y tarifas corporativas aseguran el éxito de su viaje.
              @else
                Our privileged location, comfort and corporate rates warrant the success of your trip.
              @endif
            </p>
          </div>
          <!--<p  class="wow fadeInUp" data-wow-offset="150" data-wow-delay="0.2s" style="font-size: 16px">
            @if($idioma == 'es')
              Garden Hotel es un hotel 4 estrellas, ubicado en el distrito de San Isidro, en la ciudad de la Lima, Perú.<br>
              Nuestras confortables habitaciones, coordial serivicio  y exelente ubicación aseguran el éxito en su viaje.
            @else
              Garden Hotel is a 4 stars hotel, located in the district of San Isidro, in the city of Lima, Peru. <br>
              Our comfortable rooms, coordinated service and excellent location ensure success in your trip.
            @endif
          </p>-->
        </div>
        <div class="col-md-3 wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s">
          <div class="inlineflex">
            <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
            <p style="font-size: 16px;">@if($idioma == 'es')  Wifi alta velocidad @else High speed Wifi @endif</p>
          </div>
        </div>
        <div class="col-md-3 wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s" >
          <div class="inlineflex">
            <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
            <p style="font-size: 16px;">Business Center</p>
          </div>
        </div>
        <div class="col-md-3 wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s" >
          <div class="inlineflex">
            <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
            <p style="font-size: 16px;">@if($idioma == 'es') Estacionamiento @else Parking @endif</p>
          </div>
        </div>
        <div class="col-md-3 wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s" >
          <div class="inlineflex">
            <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
            <p style="font-size: 16px;">@if($idioma == 'es') Sala de Conferencia @else Meeting Room @endif</p>
          </div>
        </div>
      </div>
      <div class="large">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
      </div>
    </div>
    <div id="grid-img">
      <div class="container-fluid pd-0">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-offset="150" style="padding: 0px">
            <div class="green-light">
              <div class="green-dark"><img class="img-dark" src="{{ asset('imgs-front/icons/hotel.svg') }}"></div><br><span class="title-service"><a href="{{$idioma == 'es'? '/hotel' : '/hotel/en/'}}">HOTEL</a></span>
            </div>
            <div class="overflow">
              <a href="{{$idioma == 'es'? '/hotel' : '/hotel/en/'}}"><div class="img-box img-zoom" style="background-image:url('../imgs-front/calidad/hotel.jpg')"></div></a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-offset="150" style="padding: 0px">
            <div class="green-light">
              <div class="green-dark"><img class="img-dark" src="{{ asset('imgs-front/icons/cama1.svg') }}"></div><br><span class="title-service"><a href="{{$idioma == 'es'? '/habitaciones' : '/rooms/en/'}}">@if($idioma == 'es') HABITACIONES @else ROOMS @endif</a></span>
            </div>
            <div class="overflow">
              <a href="{{$idioma == 'es'? '/habitaciones' : '/rooms/en/'}}">
                <div class="img-box1 img-zoom" style="background-image:url('../imgs-front/calidad/habitaciones.jpg')"></div>
              </a>
            </div>
            
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-offset="150" style="padding: 0px">
            <div class="green-light">
              <div class="green-dark"><img class="img-dark" src="{{ asset('imgs-front/icons/sala-de-conferencias.svg') }}"></div><br><span class="title-service"><a href="{{$idioma == 'es'? '/sala-conferencias' : '/conferencehall/en/'}}">@if($idioma == 'es') SALA DE CONFERENCIA @else MEETING ROOM @endif</a></span>
            </div>
            <div class="overflow">
              <a href="{{$idioma == 'es'? '/sala-conferencias' : '/conferencehall/en/'}}">
                <div class="img-box2 img-zoom" style="background-image:url('../imgs-front/calidad/auditrorio.jpg')"></div>
              </a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-offset="150" style="padding: 0px">
            <div class="green-light">
              <div class="green-dark"><img class="img-dark" src="{{ asset('imgs-front/icons/hotel-restaurante.svg') }}"></div><br>
              <a href="{{$idioma == 'es'? '/hotel/' : '/hotel/en/'}}"><span class="title-service">RESTAURANT</span></a>
            </div>
            <div class="overflow">
              <a href="{{$idioma == 'es'? '/hotel/' : '/hotel/en/'}}">
                <div class="img-box3 img-zoom" style="background-image:url('../imgs-front/calidad/comedor.jpg')"></div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section" id="section1">
    <div class="text-financiero" >
      <div class="container" style="padding: 0px">
        <div class="row">
          <!--<p class="wow fadeInUp" data-wow-offset="150" style="font-size: 16px">
            @if($idioma == 'es') Estamos ubicados en el @else  We are located @endif
          </p>-->
          <h2 class="mg-0 color-green wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s">
            @if($idioma == 'es') CENTRO FINANCIERO @else FINANCIAL CENTER @endif
          </h2>
          <img src="{{ asset('imgs-front/marco-centro.png') }}">
        </div>
        <div class="row">
          <div class="col-md-offset-2 col-md-8 intro wow fadeInUp" data-wow-offset="150" data-wow-delay="0.2s">
            <p style="font-size: 16px">
              @if($idioma == 'es')
              Garden Hotel está ubicado en la zona donde se realizan los más importantes eventos<br>
              a nivel internacional y cerca de los centros comerciales
              @else
                At near the most importants and prestigious<br>
                international events and the Shopping Centers in Lima
              @endif
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid pd-0">
      <div class="row">
        @foreach ($centros as $centro)
        <div class="col-md-3 col-sm-6 col-xs-12 pd-0 wow fadeInUp" data-wow-offset="150" data-wow-delay="0.2s">
          <div  class="img-w1" style="background-image: url('../{{$centro->path_imagen}}')"></div>
          <div class="box-verde green-dark wow fadeInRight" data-wow-delay="0.2s">
            @if ($idioma == 'es')
              <p class="color-white size-12 mg-0 ">{{$centro->titulo}}</p>
            @else
              <p class="color-white size-12 mg-0 ">{{$centro->titulo_en}}</p>
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
<style type="text/css">
  #grid-img a {display: inherit; color: inherit; text-decoration: none;}
</style>
@endsection
@push('scripts')
  <script src="{{ asset('js-front/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js-front/min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js-front/slidzomm.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js-front/jquery.owl.carousel.min.js') }}"></script>
  <script type="text/javascript">
      $(document).ready(function () {
          var iniciar = new hansermarConstructor();
          iniciar.owlcarouselBanner();
      });
  </script>
@endpush