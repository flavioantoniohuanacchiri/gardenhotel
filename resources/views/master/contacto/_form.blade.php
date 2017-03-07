<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('contacto[nombre]', $contacto->nombre, ['class' => 'form-control', 'id' => 'nombre', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('apellido', 'Apellido') !!}
        {!! Form::text('contacto[apellido]', $contacto->apellido, ['class' => 'form-control', 'id' => 'apellido', 'required' => 'required']) !!}
</div>


<div class="clearfix"></div>


<div class="ln_solid"></div>