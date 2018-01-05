@extends('layouts.blank')
@section('main_container')
  <div class="right_col" role="main">

    <h1 class="text-uppercase">{{$section}}</h1>

    @include('master.web-partials._section-data')

  </div>
@endsection
@push('scripts')
  <script>
      var located = 2;
  </script>
  <script src="{{ asset("js/web.js") }}"></script>
  <script src="{{ asset("js/web_ajax.js") }}"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
  <script>
      $('#ckeditor_ubicacion').ckeditor();
      $('#ckeditor_ubicacion_en').ckeditor();
      $('#ckeditor_telefono').ckeditor();
      $('#ckeditor_email').ckeditor();
  </script>
@endpush