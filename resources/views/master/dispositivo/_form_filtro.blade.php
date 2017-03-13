<div class="col-md-3 col-sm-3 col-xs-12 form-group">
    {!! Form::label('fecha', 'Fecha') !!}
    {!! Form::text('fechafiltro', date('Y-m-d'), ['class' => 'form-control', 'id' => 'fechafiltro']) !!}
</div>
<div class="col-md-3 col-sm-3 col-xs-12 form-group">
	{!! Form::label('estado', 'Estado') !!}
    {!! Form::select('estadofiltro', [""=> "Todos", 0 => "Inactivo", 1 => "Activo"], null, ['class' => 'form-control selectpicker', 'id' => 'clientefiltro', 'data-live-search' => true, 'required' => 'required']) !!}
</div>
<div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right">
	<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-dispositivo.bs-example-modal-lg">{{trans('master.create')}}</button>
	<button type="button" class="btn btn-success btn-search pull-right"><i class="fa fa-search"></i></button>
</div>