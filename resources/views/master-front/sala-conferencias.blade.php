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
                      @if ($idioma == 'es')
                        {{$banner->titulo}}
                      @else
                        {{$banner->titulo_en}}
                      @endif
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
@endsection
@push('scripts')
  <script>
      var located = 4;
  </script>
  <script src="js-front/slick.js"></script>
  <script src="js-front/bootstrap.min.js"></script>
@endpush