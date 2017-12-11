@push('styles')
  <link href="css-front/ofertas.css" rel="stylesheet" type="text/css" media="all">
  <link href="css-front/slick-theme.css" rel="stylesheet">
  <link href="css-front/slick.css" rel="stylesheet" type="text/css">
  <style>
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }
    .slider {
      width: 100%;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }
  </style>
@endpush
@extends('layouts.master-public')
@section('content')
  <section class="home1">
    <div id="slider-hotel" class="slider slider-for">
      <div class="bar">
        <img class="img-hotel1" alt="" src="./imgs-front/hotel/lobby-bar.jpg" alt="">
        <div class="row">
          <div class="container">
            <div class="box-body">
              <div class="green-light">
                <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="icons/hotel.svg"></div><br><span class="pd-15 text-light">
                    GARDEN HOTEL CUENTAN CON
                  </span>
              </div>
              <div class="border-green">
                <ul class="text-light">
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Aire acondicionado, calefacción, wifi gratuito
                        de máximo 50MB, TV HD de 40 pulgadas con
                        125 canales de cable Radio/Despertador,
                        teléfono con discado internacional, frio bar,
                        caja de seguridad, servicio de lavanderia
                        express (24 horas), baño con ducha y tina.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        La habitación doble puede incluir dos camas
                        twin o una cama queen.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Habitaciones con piso de alfombra o piso de
                        madera
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="comedor">
        <img class="img-hotel1" alt="" src="./imgs-front/hotel/comedor.jpg" alt="">
        <div class="row">
          <div class="container">
            <div class="box-body">
              <div class="green-light">
                <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="icons/hotel.svg"></div><br><span class="pd-15 text-light">
                    GARDEN HOTEL CUENTAN CON
                  </span>
              </div>
              <div class="border-green">
                <ul class="text-light">
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Aire acondicionado, calefacción, wifi gratuito
                        de máximo 50MB, TV HD de 40 pulgadas con
                        125 canales de cable Radio/Despertador,
                        teléfono con discado internacional, frio bar,
                        caja de seguridad, servicio de lavanderia
                        express (24 horas), baño con ducha y tina.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        La habitación doble puede incluir dos camas
                        twin o una cama queen.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Habitaciones con piso de alfombra o piso de
                        madera
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mezanine">
        <img class="img-hotel1" alt="" src="./imgs-front/hotel/mezanine.jpg" alt="">
        <div class="row">
          <div class="container">
            <div class="box-body">
              <div class="green-light">
                <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="icons/hotel.svg"></div><br><span class="pd-15 text-light">
                    GARDEN HOTEL CUENTAN CON
                  </span>
              </div>
              <div class="border-green">
                <ul class="text-light">
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Aire acondicionado, calefacción, wifi gratuito
                        de máximo 50MB, TV HD de 40 pulgadas con
                        125 canales de cable Radio/Despertador,
                        teléfono con discado internacional, frio bar,
                        caja de seguridad, servicio de lavanderia
                        express (24 horas), baño con ducha y tina.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        La habitación doble puede incluir dos camas
                        twin o una cama queen.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Habitaciones con piso de alfombra o piso de
                        madera
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="jardin">
        <img class="img-hotel1" alt="" src="./imgs-front/hotel/jardin.jpg" alt="">
        <div class="row">
          <div class="container">
            <div class="box-body">
              <div class="green-light">
                <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="icons/hotel.svg"></div><br><span class="pd-15 text-light">
                    GARDEN HOTEL CUENTAN CON
                  </span>
              </div>
              <div class="border-green">
                <ul class="text-light">
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Aire acondicionado, calefacción, wifi gratuito
                        de máximo 50MB, TV HD de 40 pulgadas con
                        125 canales de cable Radio/Despertador,
                        teléfono con discado internacional, frio bar,
                        caja de seguridad, servicio de lavanderia
                        express (24 horas), baño con ducha y tina.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        La habitación doble puede incluir dos camas
                        twin o una cama queen.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Habitaciones con piso de alfombra o piso de
                        madera
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="terraza">
        <img class="img-hotel1" alt="" src="./imgs-front/hotel/lobby-terraza.jpg" alt="">
        <div class="row">
          <div class="container">
            <div class="box-body">
              <div class="green-light">
                <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="icons/hotel.svg"></div><br><span class="pd-15 text-light">
                    GARDEN HOTEL CUENTAN CON
                  </span>
              </div>
              <div class="border-green">
                <ul class="text-light">
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Aire acondicionado, calefacción, wifi gratuito
                        de máximo 50MB, TV HD de 40 pulgadas con
                        125 canales de cable Radio/Despertador,
                        teléfono con discado internacional, frio bar,
                        caja de seguridad, servicio de lavanderia
                        express (24 horas), baño con ducha y tina.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        La habitación doble puede incluir dos camas
                        twin o una cama queen.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Habitaciones con piso de alfombra o piso de
                        madera
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="lobby">
        <img class="img-hotel1" alt="" src="./imgs-front/hotel/lobby2.jpg" alt="">
        <div class="row">
          <div class="container">
            <div class="box-body">
              <div class="green-light">
                <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="icons/hotel.svg"></div><br><span class="pd-15 text-light">
                    GARDEN HOTEL CUENTAN CON
                  </span>
              </div>
              <div class="border-green">
                <ul class="text-light">
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Aire acondicionado, calefacción, wifi gratuito
                        de máximo 50MB, TV HD de 40 pulgadas con
                        125 canales de cable Radio/Despertador,
                        teléfono con discado internacional, frio bar,
                        caja de seguridad, servicio de lavanderia
                        express (24 horas), baño con ducha y tina.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        La habitación doble puede incluir dos camas
                        twin o una cama queen.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Habitaciones con piso de alfombra o piso de
                        madera
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="recepcion">
        <img class="img-hotel1" alt="" src="./imgs-front/hotel/recepcion.jpg" alt="">
        <div class="row">
          <div class="container">
            <div class="box-body">
              <div class="green-light">
                <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="icons/hotel.svg"></div><br><span class="pd-15 text-light">
                    GARDEN HOTEL CUENTAN CON
                  </span>
              </div>
              <div class="border-green">
                <ul class="text-light">
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Aire acondicionado, calefacción, wifi gratuito
                        de máximo 50MB, TV HD de 40 pulgadas con
                        125 canales de cable Radio/Despertador,
                        teléfono con discado internacional, frio bar,
                        caja de seguridad, servicio de lavanderia
                        express (24 horas), baño con ducha y tina.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        La habitación doble puede incluir dos camas
                        twin o una cama queen.
                      </p>
                    </div>
                  </li>
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
                        Habitaciones con piso de alfombra o piso de
                        madera
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-slide-black">
      <div class="slider slider-nav">
        <div class="wrap-small">
          <img class="img-hotel" alt="" src="./imgs-front/hotel-optimizados/lobby-bar.jpg" alt="">
          <p class="txt-float color-white">
            BAR
          </p>
        </div>
        <div class="wrap-small">
          <img class="img-hotel" alt="" src="./imgs-front/hotel-optimizados/comedor.jpg" alt="">
          <p class="txt-float color-white">
            RESTAURANTE
          </p>
        </div>
        <div class="wrap-small">
          <img class="img-hotel" alt="" src="./imgs-front/hotel-optimizados/mezanine.jpg" alt="">
          <p class="txt-float color-white">
            MEZANINE
          </p>
        </div>
        <div class="wrap-small">
          <img class="img-hotel" alt="" src="./imgs-front/hotel-optimizados/jardin.jpg" alt="">
          <p class="txt-float color-white">
            JARDIN
          </p>
        </div>
        <div class="wrap-small">
          <img class="img-hotel" alt="" src="./imgs-front/hotel-optimizados/lobby-terraza.jpg" alt="">
          <p class="txt-float color-white">
            TERRAZA
          </p>
        </div>
        <div class="wrap-small">
          <img class="img-hotel" alt="" src="./imgs-front/hotel-optimizados/lobby2.jpg" alt="">
          <p class="txt-float color-white">
            LOBBY
          </p>
        </div>
        <div class="wrap-small">
          <img class="img-hotel" alt="" src="./imgs-front/hotel-optimizados/recepcion.jpg" alt="">
          <p class="txt-float color-white">
            RECEPCIÓN
          </p>
        </div>
      </div>
    </div>
    <!--<pre><code class="language-javascript"></code></pre>-->
  </section>
@endsection
@push('scripts')
  <script src="js-front/slick.js"></script>
  <script type="text/javascript">
      $(document).on('ready', function() {
          $('.slider-for').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              fade: true,
              asNavFor: '.slider-nav'
          });
          $('.slider-nav').slick({
              slidesToShow: 3,
              autoplay: true,
              slidesToScroll: 1,
              asNavFor: '.slider-for',
              dots: false,
              centerMode: true,
              focusOnSelect: true
          });
      });
  </script>
@endpush