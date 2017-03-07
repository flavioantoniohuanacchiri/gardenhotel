@extends('layouts.blank')

@push('scripts')
<script>
    var dataTablePerfilModulo;
    $(function () {
    dataTablePerfilModulo =  $('#perfil-modulo-table').DataTable({
            "lengthChange": false
            , "ordering": false
            , "searching": false
            , columns: [
                    {data: 'id', name: 'id', visible: false},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });    
    });
</script>
@include('master/perfil/js_form')
@endpush

@section('main_container')

<!-- page content -->
<div class="right_col" role="main">

        <h1 class="text-uppercase">{{ trans('master.create module', ['module' => 'perfil']) }}</h1>

        <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                                <div class="x_content">

                                        {!! Form::open(['url' => route('perfil.store'), 'class'=> 'form-horizontal']) !!}
                                
                                        @include('master/perfil/_form')
                                        
                                        <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                        {!! link_to('perfil', trans('master.cancel'), ['class' => 'btn btn-primary']) !!}
                                                        {!! Form::submit(trans('master.save'),['class' => 'btn btn-info'])  !!}
                                                </div>
                                        </div>
                                        
                                        {!! Form::close() !!}

                                </div>
                        </div>
                </div>
        </div>

</div>
<!-- /page content -->

@include('includes/footer')
@endsection