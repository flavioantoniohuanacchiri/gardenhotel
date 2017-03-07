<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('cliente[nombre]', $cliente->nombre, ['class' => 'form-control', 'id' => 'nombre', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('apellido', 'Apellido') !!}
        {!! Form::text('cliente[apellido]', $cliente->apellido, ['class' => 'form-control', 'id' => 'apellido', 'required' => 'required']) !!}
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('documento', 'DNI') !!}
        {!! Form::text('cliente[documento]', $cliente->documento, ['class' => 'form-control', 'id' => 'documento', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::email('cliente[email]', $cliente->email, ['class' => 'form-control', 'id' => 'email']) !!}
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('ciudad', 'Ciudad') !!}
        {!! Form::text('cliente[ciudad]', $cliente->ciudad, ['class' => 'form-control', 'id' => 'ciudad']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('direccion', 'Direccion') !!}
        {!! Form::text('cliente[direccion]', $cliente->direccion, ['class' => 'form-control', 'id' => 'direccion']) !!}
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('movil', 'Telefono #1') !!}
        {!! Form::text('cliente[movil]', $cliente->movil, ['class' => 'form-control', 'id' => 'movil']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('movildos', 'Telefono #2') !!}
        {!! Form::text('cliente[movildos]', $cliente->movildos, ['class' => 'form-control', 'id' => 'movildos']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('zonal pago', 'Zonal de Pago') !!}
        {!! Form::select('cliente[zonal]', $zonales, $cliente->id_zonal, ['class' => 'form-control', 'id' => 'zonal', 'required' => 'required']) !!}
</div>
@if (\Config::get("sistema.custom"))
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('zonal bandeja', 'Zonal de Bandejas') !!}
        {!! Form::select('cliente[zonal_bandeja]', $zonales, $cliente->id_zonal_bandeja, ['class' => 'form-control', 'id' => 'zonal_bandeja', 'required' => 'required']) !!}
</div>
@endif
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::select('cliente[estado]', [ '1' => 'ACTIVO', '0' => 'INACTIVO'], null, ['class' => 'form-control', 'id' => 'estado']) !!}
</div>

<div class="clearfix"></div>

<!--<fieldset>
        <legend>
                Usuario
        </legend>
        @include('master/cliente/_form_user')
</fieldset> -->


<div class="ln_solid"></div>