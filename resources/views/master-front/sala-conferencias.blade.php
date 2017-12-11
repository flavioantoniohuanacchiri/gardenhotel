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
          <div style="position:relative;"><img class="img-hab" src="./imgs-front/sala-conferencia/c-1.jpg" />
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
                  <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="icons/hotel.svg"></div><br><span class="pd-15 text-light">
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
          <div style="position:relative;"><img class="img-hab" src="./imgs-front/sala-conferencia/c-2.jpg" />
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
                  <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="icons/hotel.svg"></div><br><span class="pd-15 text-light">
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
@endsection
@push('scripts')
  <script src="js-front/slick.js"></script>
  <script src="js-front/bootstrap.min.js"></script>
@endpush