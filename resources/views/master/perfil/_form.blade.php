<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::select('estado', [ '1' => 'ACTIVO', '0' => 'INACTIVO'], null, ['class' => 'form-control']) !!}
</div>

{!! Form::hidden('modulo[data]', '', ['id' => 'modulo-data']) !!}   

<div class="clearfix"></div>
<div class="ln_solid"></div>

@include('includes/error_list')

<div class="x_panel">
        <div class="x_title">
                Modulos del Perfil
        </div>
        <div class="x_content">
                <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group">
                                        {!! Form::label('modulo-nombre', 'Modulo', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                                {!! Form::select('modulo[nombre]', [ '' => 'Seleccionar'], null, ['class' => 'form-control', 'id' => 'modulo-nombre']) !!}
                                        </div>
                                </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                                <button type="button" id="addRowPerfilModuloTable" class="btn btn-default">{!! trans('master.add')  !!}</button>
                        </div>
                </div>

                <table class="table table-striped table-bordered dt-responsive nowrap" id="perfil-modulo-table"  cellspacing="0" width="100%">
                        <thead>
                                <tr>
                                        <th>Id</th>
                                        <th>Modulo</th>
                                        <th>Action</th>                               
                                </tr>
                        </thead>
                </table>
        </div>
</div>

<div class="clearfix"></div>
<div class="ln_solid"></div>