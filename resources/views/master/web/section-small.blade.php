@extends('layouts.blank')
@section('main_container')
  <div class="right_col" role="main">

    <h1 class="text-uppercase">{{$section}}</h1>

    @include('master.web-partials._section-small-data')

  </div>
@endsection
@push('scripts')

  <script src="{{ asset("js/web-small.js") }}"></script>
  <script src="{{ asset("js/web-small_ajax.js") }}"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
  <script> var section_name="{{$section}}"</script>
  <script>
      console.log(section_name);
      CKEDITOR.replace( 'ckeditor_telefono', {
          height: 60
      });
      CKEDITOR.replace( 'ckeditor_ubicacion_en', {
          height: 60
      });
      CKEDITOR.replace( 'ckeditor_ubicacion', {
          height: 60
      });
      if (section_name !== 'Header') {
          CKEDITOR.replace( 'ckeditor_email', {
              height: 60
          });
      }


  </script>
@endpush