@extends('layouts.blank')

@section('main_container')
  <div class="right_col" role="main">
    <h1 class="text-uppercase">Hoteles</h1>
    @include('master.web-partials._section-form')
    @include('master.web-partials._banner-table')
  </div>
  @include('master.web-partials._banner-form')
@endsection

@push('scripts')
  <script src="{{ asset("js/web.js") }}"></script>
  <script src="{{ asset("js/web_ajax.js") }}"></script>
@endpush