<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('codigo', 'Codigo') !!}
        {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('pesobandeja', 'Peso Bandeja') !!}
        {!! Form::text('pesobandeja', null, ['class' => 'form-control']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::select('estado', [ '1' => 'ACTIVO', '0' => 'INACTIVO'], null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>
<div class="ln_solid"></div>