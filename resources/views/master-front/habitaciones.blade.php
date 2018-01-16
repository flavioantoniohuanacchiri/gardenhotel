@push('styles')
  <link href="{{ asset('css-front/ofertas.css') }}" rel="stylesheet" type="text/css" media="all">
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
        @foreach($banners as $key => $banner)
        <div @if($key === 0) class="item active" @else class="item" @endif >
          <div style="position:relative;"><img class="img-hab" src="{{ asset($banner->path_imagen) }}" />
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
                  <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="{{ asset('imgs-front/icons/hotel.svg') }}"></div><br><span class="pd-15 text-light">
                      @if ($idioma == 'es') {{$banner->titulo}} @else {{$banner->titulo_en}} @endif
                    </span>
                </div>
                <div class="border-green">
                  <ul class="text-light">
                    @foreach( $banner->lists as $list)
                    <li>
                      <div class="inlineflex">
                        <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                        <p style="font-size: 14px;">
                          {{ $list }}
                        </p>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <section id="" class="container-fluid bg-black">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-12 wow fadeInLeft" data-wow-delay="0.2s">
          <div class="content-hab">
            <div class="box-green">
              <img class="icon-hab" src="{{ asset('imgs-front/icons/cama2.svg')}}">
            </div>
            <div class="txt-hab color-white">
              <p class="mg-0 inlineflex">HABITACIÓN&nbsp;<strong> SIMPLE</strong></p>
              <span class="txt-light">{{$precio_simple}} <strong>USD</strong></span>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-sm-12 wow fadeInLeft" data-wow-delay="0.2s">
          <div class="content-hab">
            <div class="box-green">
              <img class="icon-hab" src="{{ asset('imgs-front/icons/cama1.svg')}}">
            </div>
            <div class="txt-hab color-white">
              <p class="mg-0 inlineflex">HABITACIÓN&nbsp;<strong> DOBLE</strong></p>
              <span class="txt-light">{{$precio_doble}} <strong>USD</strong></span>
            </div>
          </div>
        </div>
        <div class="col-md-5 col-sm-12 space pd-left wow fadeInRight" data-wow-delay="0.2s">
          <div class="stick-left"></div>
          <div class="pd-18 desayuno">
            <img class="icon-cafe" src="{{ asset('imgs-front/icons/taza-cafe.svg')}}">
            <span style="font-size: 15px;letter-spacing: 1px;"><strong class="txt-light">Los precios incluyen desayuno buffet</strong></span>
            <hr>
            {!! $desc_desayuno !!}
          </div>
          <div class="stick-right"></div>
        </div>
        <div class="col-md-3 col-sm-12 wow fadeInRight" data-wow-delay="0.2s">
          <div class="inlineflex sis-reserva">
            <img class="icon-reserva" src="{{ asset('imgs-front/icons/lapiz.svg')}}">
            <a href="{{url('reservas') }}" class="btn btn-success">
              &nbsp;&nbsp;&nbsp;SISTEMA DE RESERVAS
            </a>
          </div>
        </div>
        <div class="col-sm-12" style="margin-left: 30px">
          <span style="color: white">CHECK IN 13:00</span>
          <span style="color: white; padding-left: 20px">CHECK OUT 12:00</span>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('scripts')
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
@endpush