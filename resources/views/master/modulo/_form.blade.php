<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('url', 'Url') !!}
        {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('parent', 'Padre') !!}
         {!! Form::select('parent', $modulos, null, ['class' => 'form-control', 'id' => 'idmoduloparent', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('visible', 'Visible') !!}
        {!! Form::select('visible', ['0' => 'NO', '1' => 'SI'], null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::select('estado', [ '1' => 'ACTIVO', '0' => 'INACTIVO'], null, ['class' => 'form-control']) !!}
</div>

<div class="clearfix"></div>
<div class="ln_solid"></div>