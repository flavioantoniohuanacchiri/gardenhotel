@push('styles')
  <link href="css-front/ofertas.css" rel="stylesheet" type="text/css" media="all">
@endpush
@extends('layouts.master-public')
@section('content')
  <section id="rooms">
    <div id="carousel-example-habitaciones" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-habitaciones" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-habitaciones" data-slide-to="1"></li>
        <li data-target="#carousel-example-habitaciones" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <div style="position:relative;"><img class="img-hab" src="./imgs-front/habitaciones/h-1.jpg" />
            <a class="left carousel-control" href="#carousel-example-habitaciones" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-habitaciones" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>

          <div class="row">
            <div class="container">
              <div class="box-body">
                <div class="green-light">
                  <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="imgs-front/icons/hotel.svg"></div><br><span class="pd-15 text-light">
                      NUESTRAS HABITACIONES CUENTAN CON
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
        <div class="item">
          <div style="position:relative;"><img class="img-hab" src="./imgs-front/habitaciones/h-2.jpg" />
            <a class="left carousel-control" href="#carousel-example-habitaciones" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-habitaciones" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
          <div class="row">
            <div class="container">
              <div class="box-body">
                <div class="green-light">
                  <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="imgs-front/icons/hotel.svg"></div><br><span class="pd-15 text-light">
                      NUESTRAS HABITACIONES CUENTAN CON
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


    </div>
  </section>
  <section id="" class="container-fluid bg-black">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-12 wow fadeInLeft" data-wow-delay="0.2s">
          <div class="content-hab">
            <div class="box-green">
              <img class="icon-hab" src="./imgs-front/icons/cama2.svg">
            </div>
            <div class="txt-hab color-white">
              <p class="mg-0 inlineflex">HABITACIÓN&nbsp;<strong> SIMPLE</strong></p>
              <span class="txt-light">90.00 <strong>USD</strong></span>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-sm-12 wow fadeInLeft" data-wow-delay="0.2s">
          <div class="content-hab">
            <div class="box-green">
              <img class="icon-hab" src="./imgs-front/icons/cama1.svg">
            </div>
            <div class="txt-hab color-white">
              <p class="mg-0 inlineflex">HABITACIÓN&nbsp;<strong> DOBLE</strong></p>
              <span class="txt-light">95.00 <strong>USD</strong></span>
            </div>
          </div>
        </div>
        <div class="col-md-5 col-sm-12 space pd-left wow fadeInRight" data-wow-delay="0.2s">
          <div class="stick-left"></div>
          <div class="pd-18">
            <img class="icon-cafe" src="./imgs-front/icons/taza-cafe.svg">
            <span style="font-size: 15px;letter-spacing: 1px;"><strong class="txt-light">Los precios incluyen desayuno buffet</strong></span>
            <hr>
            <p class="txt-price mg-0">
              Los precios no incluyen I.G.V. Las personas no residentes en
              Perú están exoneradas de I.G.V. mostrando su tarjeta de migraciones.
            </p>
          </div>
          <div class="stick-right"></div>
        </div>
        <div class="col-md-3 col-sm-12 wow fadeInRight" data-wow-delay="0.2s">
          <div class="inlineflex sis-reserva">
            <img class="icon-reserva" src="./imgs-front/icons/lapiz.svg">
            <a href="#" class="btn btn-success">
              &nbsp;&nbsp;&nbsp;SISTEMA DE RESERVAS
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('scripts')
  <script src="js/bootstrap.min.js"></script>
@endpush