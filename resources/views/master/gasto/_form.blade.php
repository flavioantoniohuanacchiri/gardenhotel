<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('gasto[nombre]', $gasto->nombre, ['class' => 'form-control', 'id' => 'nombre', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('codigo', 'Codigo') !!}
        {!! Form::text('gasto[codigo]', $gasto->codigo, ['class' => 'form-control', 'id' => 'codigo']) !!}
</div>
<div class="clearfix"></div>

<div class="ln_solid"></div>