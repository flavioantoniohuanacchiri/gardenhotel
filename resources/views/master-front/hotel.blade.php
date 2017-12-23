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
      @foreach ($banners as $key => $banner)
      <div class="mezanine{{$key}}">
        <img class="img-hotel1" alt="" src="{{ $banner->path_imagen }}" alt="">
        <div class="row">
          <div class="container">
            <div class="box-body">
              <div class="green-light">
                <div class="green-dark"><img class="img-dark" style="width:30px; margin:auto" src="imgs-front/icons/hotel.svg"></div><br><span class="pd-15 text-light">
                    {{ $banner->titulo }}
                  </span>
              </div>
              <div class="border-green">
                <ul class="text-light">
                  @foreach( $banner->lists as $list)
                  <li>
                    <div class="inlineflex">
                      <span class="mr-5"><i class="fa fa-circle i-green-light" aria-hidden="true"></i></span>
                      <p style="font-size: 12px;">
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
    <div class="bg-slide-black">
      <div class="slider slider-nav">
        @foreach ($banners as $key => $banner)
          <div class="wrap-small">
            <img class="img-hotel" alt="" src="{{$banner->path_imagen_sm}}" alt="">
            <p class="txt-float color-white">
              {{$banner->titulo}}
            </p>
          </div>
        @endforeach
      </div>
    </div>
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