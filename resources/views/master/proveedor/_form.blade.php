<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('ruc', 'Ruc') !!}
        {!! Form::text('ruc', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('razonsocial', 'Razon Social') !!}
        {!! Form::text('razonsocial', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('ciudad', 'Ciudad') !!}
        {!! Form::text('ciudad', null, ['class' => 'form-control']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('telefono', 'Telefono') !!}
        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('direccion', 'Direccion') !!}
        {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::select('estado', [ '1' => 'ACTIVO', '0' => 'INACTIVO'], null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>
<div class="ln_solid"></div>