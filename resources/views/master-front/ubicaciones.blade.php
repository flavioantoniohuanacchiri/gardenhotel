@push('styles')
  <link href="css-front/ofertas.css" rel="stylesheet" type="text/css" media="all">
@endpush
@extends('layouts.master-public')
@section('content')
  <section id="ubicacion">
    <div class="container">
      <div class="sectio-title text-center">
        <h2 class="mg-0 color-green wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s">
          UBICACIÓN
        </h2>
        <img class="fadeInUp mt-30" data-wow-offset="150" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;" src="imgs-front/marco-centro.png">
        <p class="wow fadeInUp mt-30" data-wow-offset="150" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
          Garden Hotel se ubica en el corazón del exclusivo y moderno centro finaciero de Lima, en el distrito de San Isidro.
          Además estamos cerca del Centro de Convenciones de Lima donde se realizan los mas importantes eventos
        </p>
        <h5 class="color-green mt-30 wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s">
          LA INMEJORABLE UBICACIÓN DEL GARDEN HOTEL LE PERMITE ACCESO A:
        </h5>
      </div>
    </div>
  </section>
  <section>
    <div class="container-fluid pd-0">
      <div class="row">
        @foreach ($centros as $centro)
          <div class="col-md-3 col-sm-6 col-xs-12 pd-0 wow fadeInUp" data-wow-offset="150" data-wow-delay="0.2s">
            <div  class="img-w1" style="background-image: url('../{{$centro->path_imagen}}')"></div>
            <div class="box-verde green-dark wow fadeInRight" data-wow-delay="0.2s">
              <p class="color-white size-12 mg-0 ">{{$centro->titulo}}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <section>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2319.724016669767!2d-77.02686124009611!3d-12.091930653254085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c86418fc33f9%3A0x230cc238ab2d83f5!2sAv.+Rivera+Navarrete+450%2C+San+Isidro+15046!5e0!3m2!1ses!2spe!4v1501260786839" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </section>
@endsection
@push('scripts')
  <script src="js/bootstrap.min.js"></script>
@endpush