<!DOCTYPE html>
<html>
<head>
  <title>{{$titulo}}</title>
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="description" content="{{$desc}}">
  <link href="./images/garden.ico" rel="shortcut icon" />
  <link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css-front/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
  <link href="{{ asset('css-front/animate.css')}}" rel="stylesheet" type="text/css" media="all">
  <link href="{{ asset('css-front/main.css')}}" rel="stylesheet" type="text/css" media="all">
  <link href="{{ asset('css-front/fonts.css')}}" rel="stylesheet" type="text/css">
  @stack('styles')
  <style>
    .ubicacion-header p{
      margin: 0px;
      font-size: 12px;
      padding-left: 10px;
    }
    .footer-p p {
      display: inline-block;
      padding-left: 4px;
    }
    .footer-p a {
      color: white
    }
    .footer-p img {
      display: inline-block;
    }
    .desayuno p{
      font-size: 10px;
      color: white;
      line-height: 1.2;
    }
    form.fbqs {
      margin-top: 0px !important;
      padding: 15px 30px
    }
  </style>
</head>
<body>
  <div class="navbar navbar-default navbar-fixed-top">
  <section class="header">
    <div class="container content-small">
      <div class="row">
        <div class="items-line col-md-3 col-xs-12 col-sm-12 ubicacion-header"><img src="{{asset('imgs-front/icons/ubicacion.svg')}}" width="25px">
          @if ($idioma == 'es')  {!! $header['ubicacion'] !!}
          @else {!! $header['ubicacion_en'] !!}
          @endif
        </div>
        <div class="col-md-5 col-xs-12 col-sm-12"></div>
        <div class="col-md-4 col-xs-12 col-sm-12">
          <div class="head-right">
            <a href="{{url('/')}}">
              <img class="logo-responsive" src="{{asset('imgs-front/logo-menu.svg')}}" alt="logo-hotel-garden">
            </a>
            <div class="idiomas">
              <ul>
                <li><a @if($idioma == 'es') class="icon_peru active" @else class="icon_peru" @endif href="{{url($paths['es'])}}" style=""></a></li>
                <li><a @if($idioma == 'en') class="icon_euu active" @else class="icon_euu" @endif href="{{url($paths['en'])}}"></a></li>
              </ul>
            </div>
            <div class="header-contacto"><img src="{{asset('imgs-front/icons/tel.svg') }}" width="31px">
              {!! $header['telefono'] !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <a href="{{url('/')}}">
    <section class="logo-nav">
      <div class="circle-logo">
        <img src="{{ asset('imgs-front/medialuna.png') }}">
      </div>
      <img class="logo" src="{{ asset('imgs-front/logo-garden-hotel.png') }}" alt="logo-hotel-garden">
    </section>
  </a>
  <section class="menu">
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display-->
        <div class="navbar-header">
          <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          <a class="navbar-brand" href="#">Home</a>
          <!-- a.navbar-brand(href='#') NUDISBCAIUB-->
        </div>
        <!-- Collect the nav links, forms, and other content for toggling-->
        <div class="collapse navbar-collapse content-small" id="bs-example-navbar-collapse-1" style="margin: auto">
          <ul class="nav-hover nav navbar-nav">
            @if ($idioma == 'es')
              <li><a href="{{url('/')}}" >INICIO</a></li>
              <li><a href="{{url('/hotel')}}">HOTEL</a></li>
              <li><a href="{{url('/habitaciones')}}">HABITACIONES</a></li>
            @else
              <li><a href="{{url('/home/en')}}" >HOME</a></li>
              <li><a href="{{url('/hotel/en')}}">HOTEL</a></li>
              <li><a href="{{url('/rooms/en')}}">ROOMS</a></li>
            @endif
          </ul>
          <ul class="nav-hover nav navbar-nav navbar-right">
            @if ($idioma == 'es')
              <li><a href="{{url('/sala-conferencias')}}">SALA DE CONFERENCIA</a></li>
              {{--<li><a href="{{url('/ofertas')}}">OFERTAS  </a></li>--}}
              <li><a href="{{url('/reservas')}}">RESERVAS </a></li>
              <li><a href="{{url('/ubicacion')}}">UBICACIÓN </a></li>
            @else
              <li><a href="{{url('/conferencehall/en')}}">MEETING ROOM</a></li>
              {{--<li><a href="{{url('/offers/en')}}">OFFERS  </a></li>--}}
              <li><a href="{{url('/reservations/en')}}">RESERVATIONS </a></li>
              <li><a href="{{url('/location/en')}}">FIND US </a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </section>
</div>
  @yield('content')
  <div class="footer">
    <div class="footer-logo container">
      <div class="row"><img src="{{ asset('imgs-front/logo-footer.svg') }}"></div>
    </div>
    <div class="contac">
      <div class="container text-center" style="padding: 2% 0 0%">
        <div class="row">
          <div class="col-md-5 footer-p">
            <img class="icon-footer" src="{{ asset('imgs-front/icons/direccion-cabecera.svg') }}" alt="" style="display: inline-block">
            @if ($idioma == 'es') {!! $footer['ubicacion'] !!}
            @else {!! $footer['ubicacion_en'] !!}
            @endif
          </div>
          <div class="col-md-3 footer-p">
              <img class="icon-footer" src="{{ asset('imgs-front/icons/telefono-footer.svg') }}">
              {!! $footer['telefono'] !!}
          </div>
          <div class="col-md-4 footer-p">
            <img class="icon-footer" src="{{ asset('imgs-front/icons/sms.svg') }}">
            {!! $footer['email'] !!}
          </div>
        </div>
        <div class="row creditos" style="color: #1e5f33;">
          <div class="col-md-6 copy  footer-p">
            <p>Copyright 2017 - Garden Hotel</p>
          </div>
          <div class="col-md-6 name">
            <a target="_blank" href="http://raulchavez.pe/">
              <p>Diseño y desarrollo  Raúl Chavez Inche - Lima, Perú</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js-front/jquery.min.js') }}"></script>
  <script src="{{ asset('js-front/wow1-2.min.js') }}"></script>
  <script>
      new WOW().init();
  </script>
  @stack('scripts')

</body>
</html>


