@extends('layouts.blank')

<?php
        if (isset($row->modulos)) {
                $jsonData = $row->modulos;
        }
?>

@push('scripts')
@include('master/perfil/js_form')
<script>
        var dataTablePerfilModulo;
        var jsonPerfilModulo = '<?php echo  isset($jsonData)? json_encode( $jsonData ) : [] ?>';
        var objPerfilModulo = obj = JSON && JSON.parse(jsonPerfilModulo) || $.parseJSON(jsonPerfilModulo);
        $(document).ready(function() {
                dataTablePerfilModulo =  $('#perfil-modulo-table')
                .DataTable({
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

<script>
    console.log(objPerfilModulo);
        $( window ).load(function() {
                for(var i in objPerfilModulo)
                {
                        insertRowDataTable(obj[i].id_modulo, obj[i].nombre);
                        $('#modulo-nombre option[value=' + obj[i].id_modulo + ']')
                                .attr("disabled", true)
                                .prop("selected", false);
                        formatRowsDataTableToString( dataTablePerfilModulo.rows().data() );
                }
        });
</script>
@endpush

@section('main_container')

<!-- page content -->
<div class="right_col" role="main">

        <h1 class="text-uppercase">{{ trans('master.edit module', ['module' => $row->nombre ]) }}</h1>

        <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                                <div class="x_content">

                                        {!! Form::model($row,['method' => 'PATCH', 'route'=>['perfil.update',$row->id], 'class'=> 'form-horizontal']) !!}

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