<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('tiponotaabono[nombre]', $tiponotaabono->nombre, ['class' => 'form-control', 'id' => 'nombre', 'required' => 'required']) !!}
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('codigo', 'Código') !!}
        {!! Form::text('tiponotaabono[codigo]', $tiponotaabono->codigo, ['class' => 'form-control', 'id' => 'codigo', 'required' => 'required']) !!}
</div>
<div class="clearfix"></div>

<!--<fieldset>
        <legend>
                Usuario
        </legend>
        @include('master/tiponotaabono/_form_user')
</fieldset> -->


<div class="ln_solid"></div>