@extends('layouts.blank')

@push('scripts')
@include('master/grupodispositivo/js')
@endpush

@section('main_container')

<!-- page content -->
<div class="right_col" role="main">

        <h1 class="">{{ trans('master.grupodispositivo') }}</h1>

        <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                                <div class="x_title">
                                        <a href="{{route('grupodispositivo.create')}}" class="btn btn-primary">{{trans('master.create')}}</a>
                                        <ul class="nav navbar-right panel_toolbox">
                                                <li>
                                                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li>
                                                        <a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                        <table class="table table-striped table-bordered dt-responsive nowrap" id="grupodispositivo-table"  cellspacing="0" width="100%">
                                                <thead>
                                                        <tr>
                                                                <th>Id</th>
                                                                <th>Codigo</th>
                                                                <th>Descripcion</th>
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

@include('includes/footer')
@endsection