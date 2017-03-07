<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('vehiculo', 'Vehiculo') !!}
        {!! Form::text('vehiculo', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('placa', 'Placa') !!}
        {!! Form::text('placa', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('descripcion', 'Descripcion') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::select('estado', [ '1' => 'ACTIVO', '0' => 'INACTIVO'], null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>
<div class="ln_solid"></div>