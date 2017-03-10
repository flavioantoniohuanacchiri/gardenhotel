<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('banco[nombre]', $banco->nombre, ['class' => 'form-control', 'id' => 'nombre', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('direccion', 'Direccion') !!}
        {!! Form::text('banco[direccion]', $banco->direccion, ['class' => 'form-control', 'id' => 'direccion']) !!}
</div>

<div class="clearfix"></div>

<div class="ln_solid"></div>