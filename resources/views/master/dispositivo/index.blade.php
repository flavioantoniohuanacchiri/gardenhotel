@extends('layouts.blank')

@push('stylesheets')
<link href="{{ asset("css/datepicker.css") }}" rel="stylesheet">
<link href="{{ asset("css/sweetalert2.min.css") }}" rel="stylesheet">
@endpush

@section('main_container')

<!-- page content -->
<div class="right_col" role="main">

        <h1 class="">{{ trans('master.dispositivo') }}</h1>

        <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                                <div class="x_title">
                                    @include('master/dispositivo/_form_filtro')
                                        
                                        <ul class="nav navbar-right panel_toolbox">
                                             <li>
                                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                              </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                        <table class="table table-striped table-bordered dt-responsive nowrap" id="dispositivo-table"  cellspacing="0" width="100%">
                                                <thead>
                                                        <tr>
                                                                <th>Id</th>
                                                                <th>Código</th>
                                                                <th>Grupo</th>
                                                                <th>Estado</th>
                                                                <th>Updated At</th>
                                                                <th>Action</th>
                                                        </tr>
                                                </thead>
                                        </table>

                                </div>
                        </div>
                </div>
        </div>

</div>
<!-- /page content -->
@include('master/dispositivo/_form_detalle')
@include('includes/footer')
@endsection
@push('scripts')
    <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.1/jquery.xdomainrequest.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="{{ asset("js/bootstrap-datepicker.js") }}"></script>
    <script src="{{ asset("js/sweetalert2.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap-select.min.js") }}"></script>
    <script src="{{ asset("js/utils.js") }}"></script>
    <script src="{{ asset("js/dispositivo.js") }}"></script>
@endpush