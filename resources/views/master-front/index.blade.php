@push('styles')
  <link rel="stylesheet" type="text/css" href="css-front/slidzomm.css" property="stylesheet">
@endpush
@extends('layouts.master-public')
@section('content')

  <div style="position: relative;">
    <section id="inicio" class="pantallazo" >
      <div id="main">
        <div id="inicio_banner" class="fila contenido">
          <div class="owl-carousel">
            <div class="item">
              <img src="imgs-front/banner-home/b-1.jpg" width="1500" height="800">
              <div class="container-fluid">
                <div class="enriquecido">
                  <h2>
                    <span style="font-size:30px"><strong>GARDEN HOTEL SAN ISIDRO</strong></span>
                    <span style="font-size:20px; text-align: center;">En el centro financiero de Lima, en el distrito de San Isidro.</span>
                  </h2>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="imgs-front/banner-home/b-2.jpg" width="1500" height="800">
              <div class="container-fluid">
                <div class="enriquecido">
                  <h2>
                    <span style="font-size:30px"><strong>CONOCE NUESTRAS INSTALACIONES</strong></span>
                    <span style="font-size:20px"> Estilo minimalista y modernas instalaciones</span>
                  </h2>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="imgs-front/banner-home/b-3.jpg"  width="1386" height="800">
              <div class="container-fluid">
                <div class="enriquecido">
                  <h2>
                    <span style="font-size:30px"><strong>SALA COMEDOR Y LOBBBY</strong></span>
                    <span style="font-size:20px">Todo en un solo lugar al servicio de su comodidad </span>
                  </h2>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="imgs-front/banner-home/b-4.jpg" width="1386" height="800">
              <div class="container-fluid">
                <div class="enriquecido">
                  <h2>
                    <span style="font-size:30px"><strong>SALA DE REUNIONES Y CONFERENCIAS</strong></span>
                    <span style="font-size:20px">para sus eventos corporativos</span>
                  </h2>
                </div>
              </div>
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
            <img src="imgs-front/marco-centro.png">
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
              <div class="green-dark"><img class="img-dark" src="icons/hotel.svg"></div><br><span class="title-service">HOTEL</span>
            </div>
            <div class="overflow">
              <div class="img-box1 img-zoom" style="background-image:url('../imgs-front/calidad/habitaciones.jpg')"></div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-offset="150" style="padding: 0px">
            <div class="green-light">
              <div class="green-dark"><img class="img-dark" src="icons/cama1.svg"></div><br><span class="title-service">HABITACIONES</span>
            </div>
            <div class="overflow">
              <div class="img-box img-zoom" style="background-image:url('../imgs-front/calidad/hotel.jpg')"></div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-offset="150" style="padding: 0px">
            <div class="green-light">
              <div class="green-dark"><img class="img-dark" src="icons/sala-de-conferencias.svg"></div><br><span class="title-service">SALA DE CONFERENCIA</span>
            </div>
            <div class="overflow">
              <div class="img-box2 img-zoom" style="background-image:url('../imgs-front/calidad/auditrorio.jpg')"></div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-offset="150" style="padding: 0px">
            <div class="green-light">
              <div class="green-dark"><img class="img-dark" src="icons/hotel-restaurante.svg"></div><br><span class="title-service">RESTAURANT</span>
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
          <img src="imgs-front/marco-centro.png">
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
        <div class="col-md-3 col-sm-6 col-xs-12 pd-0 wow fadeInUp" data-wow-offset="150" data-wow-delay="0.2s">
          <div  class="img-w1" style="background-image: url('../imgs-front/ubicacion/bancos.jpg')"></div>
          <div class="box-verde green-dark wow fadeInRight" data-wow-delay="0.2s">
            <p class="color-white size-12 mg-0 ">
              21 bancos principales, 5 agencias bancarias, 5 administradoras de fondos de pensiones y 6 sociedades agentes de bolsa.
            </p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 pd-0 wow fadeInUp" data-wow-offset="150" data-wow-delay="0.2s">
          <div  class="img-w2" style="background-image: url('../imgs-front/ubicacion/westin.jpg')"></div>
          <div class="box-verde wow fadeInRight " data-wow-delay="0.3s" >
            <p class="color-white size-12 mg-0">
              Centro de Convenciones Hotel Westin (a dos cuadras del Garden Hotel).
            </p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 pd-0 wow fadeInUp" data-wow-offset="150" data-wow-delay="0.2s">
          <div  class="img-w3" style="background-image: url('../imgs-front/ubicacion/centro-comercial.jpg')"></div>
          <div class="box-verde green-dark wow fadeInRight " data-wow-delay="0.3s" >
            <p class="color-white size-12 mg-0">
              A menos de 4km del Centro de Convenciones de Lima "27 de Enero"
            </p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 pd-0 wow fadeInUp" data-wow-offset="150" data-wow-delay="0.2s">
          <div  class="img-w4" style="background-image: url('../imgs-front/ubicacion/areas-verdes.jpg')"></div>
          <div class="box-verde wow fadeInRight " data-wow-delay="0.3s" >
            <p class="color-white size-12 mg-0">
              Áreas verdes incluyendo el el Parque de Abtao (15,000 m2) a solo unos metros del Garden Hotel y el Bosque El Olivar (10ha) a 1.2 km de distancia.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('scripts')
  <script src="js-front/bootstrap.min.js"></script>
  <script src="js-front/min.js"></script>
  <script type="text/javascript" src="js-front/slidzomm.js"></script>
  <script type="text/javascript" src="js-front/jquery.owl.carousel.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function () {
          var iniciar = new hansermarConstructor();
          iniciar.owlcarouselBanner();
      });
  </script>
@endpush