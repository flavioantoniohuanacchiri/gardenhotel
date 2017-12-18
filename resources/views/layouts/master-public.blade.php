<!DOCTYPE html>
<html>
<head>
  <title>Garden Hotel</title>
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="./images/garden.ico" rel="shortcut icon" />
  <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="css-front/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <link href="css-front/animate.css" rel="stylesheet" type="text/css" media="all">
  <link href="css-front/main.css" rel="stylesheet" type="text/css" media="all">
  <link href="css-front/fonts.css" rel="stylesheet" type="text/css">
  @stack('styles')
</head>
<body>
  <div class="navbar navbar-default navbar-fixed-top">
  <section class="header">
    <div class="container content-small">
      <div class="row">
        <div class="items-line col-md-3 col-xs-12 col-sm-12"><img src="{{asset('icons/ubicacion.svg')}}" width="25px">
          <p class="mg-0" style="font-size: 12px;    padding-left: 10px">Avenida Ricardo Rivera Navarrete 450, San Isidro</p>
        </div>
        <div class="col-md-5 col-xs-12 col-sm-12"></div>
        <div class="col-md-4 col-xs-12 col-sm-12">
          <div class="head-right">
            <a href="index.html">
              <img class="logo-responsive" src="imgs-front/logo-menu.svg" alt="logo-hotel-garden">
            </a>
            <div class="idiomas">
              <ul>
                <li><a class="icon_peru" href=""></a></li>
                <li><a class="icon_euu" href=""></a></li>
              </ul>
            </div>
            <div class="header-contacto"><img src="icons/tel.svg" width="31px">
              <p>(511) <strong>4421771</strong> / 995743685 </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <a href="index.html">
    <section class="logo-nav">
      <div class="circle-logo">
        <img src="imgs-front/medialuna.png">
      </div>
      <img class="logo" src="imgs-front/logo-menu.svg" alt="logo-hotel-garden">
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
            <li><a href="{{url('/')}}" >INICIO</a></li>
            <li><a href="{{url('/hotel')}}">HOTEL</a></li>
            <li><a href="{{url('/habitaciones')}}">HABITACIONES</a></li>
          </ul>
          <ul class="nav-hover nav navbar-nav navbar-right">
            <li><a href="{{url('/sala-conferencias')}}">SALA DE CONFERENCIA</a></li>
            <li><a href="{{url('/ofertas')}}">OFERTAS  </a></li>
            <li><a href="{{url('/ubicacion')}}">UBICACIÓN </a></li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
</div>
  @yield('content')
  <div class="footer">
    <div class="footer-logo container">
      <div class="row"><img src="imgs-front/logo-footer.svg"></div>
    </div>
    <div class="contac">
      <div class="container text-center" style="padding: 2% 0 0%">
        <div class="row">
          <div class="col-md-5">
            <p class="color-white direc">
              <img class="icon-footer" src="icons/direccion-cabecera.svg" alt="">
              Avenida Ricardo Rivera Navarrete 450, San Isidro </p>
          </div>
          <div class="col-md-3">
            <p class="color-white tel">
              <img class="icon-footer" src="icons/telefono-footer.svg">
              (511) 4421771 / 995743685
            </p>
          </div>
          <div class="col-md-4">
            <p class="color-white mail">
              <img class="icon-footer" src="icons/sms.svg">
              <a href="mailto:reservas@gardenhotel.com.pe" style="text-decoration: none; color: #fff;">
                reservas@gardenhotel.com.pe
              </a>
            </p>
          </div>
        </div>
        <div class="row creditos" style="color: #1e5f33;">
          <div class="col-md-6 copy" >
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
  <script src="js-front/jquery.min.js"></script>
  <script src="js-front/wow1-2.min.js"></script>
  <script>
      new WOW().init();
  </script>
  @stack('scripts')
</body>
</html>


