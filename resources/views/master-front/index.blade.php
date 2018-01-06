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
            <p class="wow fadeInUp" data-wow-offset="150">Por que nuestro huésped es importante </p>
            <h2 class="mg-0 color-green wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s">
              OFRECEMOS CALIDAD
            </h2>
            <img src="{{ asset('imgs-front/marco-centro.png') }}">
          </div>
          <p  class="wow fadeInUp" data-wow-offset="150" data-wow-delay="0.2s">
            El Garden Hotel es un hotel 4 estrellas, ubicado en el moderno distrito de San Isidro, en la cuidad de Lima, Perú.<br>
            Nuestras confortables habitaciones, cordial servicio y exelente ubicación aseguran el éxito de tu viaje.
          </p><br><br>
        </div>
        <div class="col-md-3 wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s">
          <div class="inlineflex">
            <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
            <p style="font-size: 13px;"> Recepción con atención las 24 horas en inglés o español</p>
          </div>
        </div>
        <div class="col-md-3 wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s" >
          <div class="inlineflex">
            <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
            <p style="font-size: 13px;">WiFi gratuito en todo el hotel de hasta 50MB</p>
          </div>
        </div>
        <div class="col-md-3 wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s" >
          <div class="inlineflex">
            <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
            <p style="font-size: 13px;">Estacionamiento gratuito</p>
          </div>
        </div>
        <div class="col-md-3 wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s" >
          <div class="inlineflex">
            <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
            <p style="font-size: 13px;">Áreas de trabajo disponibles</p>
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
              <div class="green-dark"><img class="img-dark" src="{{ asset('imgs-front/icons/hotel.svg') }}"></div><br><span class="title-service">HOTEL</span>
            </div>
            <div class="overflow">
              <div class="img-box1 img-zoom" style="background-image:url('../imgs-front/calidad/habitaciones.jpg')"></div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-offset="150" style="padding: 0px">
            <div class="green-light">
              <div class="green-dark"><img class="img-dark" src="{{ asset('imgs-front/icons/cama1.svg') }}"></div><br><span class="title-service">HABITACIONES</span>
            </div>
            <div class="overflow">
              <div class="img-box img-zoom" style="background-image:url('../imgs-front/calidad/hotel.jpg')"></div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-offset="150" style="padding: 0px">
            <div class="green-light">
              <div class="green-dark"><img class="img-dark" src="{{ asset('imgs-front/icons/sala-de-conferencias.svg') }}"></div><br><span class="title-service">SALA DE CONFERENCIA</span>
            </div>
            <div class="overflow">
              <div class="img-box2 img-zoom" style="background-image:url('../imgs-front/calidad/auditrorio.jpg')"></div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-offset="150" style="padding: 0px">
            <div class="green-light">
              <div class="green-dark"><img class="img-dark" src="{{ asset('imgs-front/icons/hotel-restaurante.svg') }}"></div><br><span class="title-service">RESTAURANT</span>
            </div>
            <div class="overflow">
              <div class="img-box3 img-zoom" style="background-image:url('../imgs-front/calidad/comedor.jpg')"></div>
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
          <p class="wow fadeInUp" data-wow-offset="150">
            Estamos ubicados en el
          </p>
          <h2 class="mg-0 color-green wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s">
            CENTRO FINANCIERO
          </h2>
          <img src="{{ asset('imgs-front/marco-centro.png') }}">
        </div>
        <div class="row">
          <div class="col-md-offset-2 col-md-8 intro wow fadeInUp" data-wow-offset="150" data-wow-delay="0.2s">
            <p>
              Vive la modernidad de San Isidro, áreas verdes, cafés, centros comerciales y los mejores restaurantes.Además estamos cerca del Centro de Convenciones de Lima donde se realizan los mas importantes eventos.
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