<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('codigo', 'Código') !!}
        {!! Form::text('dispositivo[codigo]', '', ['class' => 'form-control', 'id' => 'codigo', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('descripcion', 'Descripcion') !!}
        {!! Form::text('dispositivo[descripcion]', '', ['class' => 'form-control', 'id' => 'descripcion']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('grupo', 'Grupo') !!}
        {!! Form::select('dispositivo[grupo]', $grupos, null, ['class' => 'form-control selectpicker', 'id' => 'idgrupo', 'data-live-search' => true, 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::select('dispositivo[estado]', [ '1' => 'ACTIVO', '0' => 'INACTIVO'], null, ['class' => 'form-control selectpicker', 'id' => 'estado', 'data-live-search' => true]) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        
</div>
<div class="clearfix"></div>

<div class="ln_solid"></div>
<h5>Imagenes de Dispositivo</h5>


<div class="col-md-3 col-sm-3 col-xs-3 form-group">
	{!! Form::label('imagen', 'Imagen') !!}
    {{ Form::file('imagen', ['class' => 'field']) }}
</div>