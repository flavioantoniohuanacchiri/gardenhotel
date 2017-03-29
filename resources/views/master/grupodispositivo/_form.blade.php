<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('grupo[nombre]', $grupo->nombre, ['class' => 'form-control', 'id' => 'nombre', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('descripcion', 'Descripcion') !!}
        {!! Form::text('grupo[descripcion]', $grupo->descripcion, ['class' => 'form-control', 'id' => 'descripcion']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::select('grupo[estado]', [ '1' => 'ACTIVO', '0' => 'INACTIVO'], null, ['class' => 'form-control', 'id' => 'estado']) !!}
</div>
<div class="clearfix"></div>


<input type="hidden" name="jsongrupogpx" value="{{json_encode($grupogpx)}}" id="jsongrupogpx">
