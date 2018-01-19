@push('styles')
  <link href="{{ asset('css-front/ofertas.css') }}" rel="stylesheet" type="text/css" media="all">
  <link href="{{ asset('css-front/slick-theme.css')}}" rel="stylesheet">
  <link href="{{ asset('css-front/slick.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css-front/form.css')}}" rel="stylesheet" type="text/css">
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

    @media screen and (max-width: 700px) {
      .figure-resev-mobile{
        display: block !important;
      }
      .figure-resev{
        display: none !important;
      }
    }
  </style>
@endpush
@extends('layouts.master-public')
@section('content')
  <section class="home1">
    <div id="carousel-example-habitaciones" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        @foreach($banners as $key => $banner)
        <div  @if($key === 0) class="item active" @else class="item" @endif >
          <img src="{{ asset($banner->path_imagen)}}" alt="Los Angeles">
        </div>
        @endforeach
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#carousel-example-habitaciones" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-habitaciones" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
  <section id="ubicacion" style="padding-top: 50px">
    <div class="container">
      <div class="sectio-title text-center">
        <h2 class="mg-0 color-green wow fadeInUp " data-wow-offset="150" data-wow-delay="0.2s">
          @if ($idioma == 'es')  RESERVAS @else RESERVATIONS @endif
        </h2>
        <img class="fadeInUp mt-30" data-wow-offset="150" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;" src="{{ asset('imgs-front/marco-centro.png') }}">
        <p class="wow fadeInUp mt-30" data-wow-offset="150" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp; font-size: 16px">
          @if ($idioma == 'es') Gracias por Elegirnos @else
            Thanks you for Choosing Us  @endif
        </p>
      </div>
    </div>
  </section>
  <section id="ubicacion" style="padding-top: 10px">
    <div class="container">
      <div class="col-md-8 col-sm-6">
        <figure class="figure-resev" style="background: url('../imgs-front/img-resrvas.jpg'); height: 398px; width: 100%; display: block; background-size: cover;">
        </figure>
        <figure class="figure-resev-mobile" style="display: none">
          <img src="{{ asset('../imgs-front/img-resrvas.jpg') }}" alt="" style="width: 100%">
        </figure>

      </div>
      <div class="col-sm-4" >
        <form target="dispoprice" name="idForm" class="fbqs">
          <h2>Online booking</h2>
          <input type="hidden" name="showPromotions" value="1" />
          <input type="hidden" name="Clusternames" value="PELIMHTLGarden" />
          <!-- Hotel identifier -->
          <input type="hidden"  name="Hotelnames" value="PELIMHTLGarden" />
          <!-- Check-in -->
          <div class="field dates checkin">
            <label>Check-in Date</label>
            <div class="selects">
              <select name="fromday">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
              <select name="frommonth">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
              <select name="fromyear">
                <option value="2018">2018</option>
                <option value="2019">2019</option>
              </select>
            </div>
          </div>
          <!-- Nights -->
          <div class="field nights">
            <label>Number of nights</label>
            <select name="nbdays">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
          </div>        <!-- Number of adults selector -->
          <div class="field adults_select">
            <label for="adulteresa">Number of adults</label>
            <select name="adulteresa">
              <option value="1" selected="selected">1</option>
              <option value="2" >2</option>
            </select>
          </div>        <!-- Number of children selector -->
          <div class="field children_select">
            <label for="enfantresa">Number of children</label>
            <select name="enfantresa">
              <option value="0" selected="selected">0</option>
              <option value="1" >1</option>
            </select>
          </div>        <!-- Promo Code -->
          <div class="field promo_code">
            <label for="AccessCode">Promo Code</label>
            <input type="text" name="AccessCode" value=""  autocomplete="off" />
          </div>    <input name="B1" type="button" value="Book now" onclick="hhotelDispoprice(this.form)" class="submit">
          <a href="javascript:;" onclick="hhotelcancel();" class="cancel">Cancel a booking</a>
        </form>
      </div>
    </div>

  </section>
@endsection
@push('scripts')
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/fbparam.js')}}"></script>
  <script src="{{ asset('js/fblib.js')}}"></script>
  <script>
      $(document).ready(function() {
          if (typeof start !== 'undefined') {
              start();
          }
      });
  </script>

@endpush