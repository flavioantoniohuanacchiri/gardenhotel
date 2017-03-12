<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('codigo', 'Código') !!}
        {!! Form::text('dispositivo[codigo]', $dispositivo['codigo'], ['class' => 'form-control', 'id' => 'codigo', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('descripcion', 'Descripcion') !!}
        {!! Form::text('dispositivo[descripcion]', $dispositivo['descripcion'], ['class' => 'form-control', 'id' => 'descripcion']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('grupo', 'Grupo') !!}
        {!! Form::select('dispositivo[grupo]', $grupos, null, ['class' => 'form-control', 'id' => 'idgrupo']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::select('dispositivo[estado]', [ '1' => 'ACTIVO', '0' => 'INACTIVO'], null, ['class' => 'form-control', 'id' => 'estado']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('imagen', 'Imagen') !!}
       {{ Form::file('imagen', ['class' => 'field']) }}
</div>
<div class="clearfix"></div>

<div class="ln_solid"></div>
<h5>Imagenes</h5>
<table>
    @if (isset($imagenes))
        @foreach ($imagenes as $imagen)
            <tr><td><img src="imgs/dispositivos/{{$imagen['url']}}" /></td></tr>
        @endforeach
    @endif
</table>