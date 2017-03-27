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

<div class="ln_solid"></div>
<fieldset>
	<legend>Archivos GPX</legend>
	<div class="col-md-4 col-sm-4 col-xs-4 form-group">
		<a class="btn-agregar"><i class="fa fa-plus btn-primary btn"></i></a>
		<a class="btn-eliminar"><i class="fa fa-minus btn-danger btn"></i></a>
	</div>
	<div class="contenedor-archivos-gpx">
		<div class="col-md-12 col-sm-12 col-xs-12 fila">
			<div class="col-md-6 col-sm-6 col-xs-6 form-group">
				{!! Form::label('archivogpx', 'Archivo') !!}
			    {{ Form::file('archivogpx[]', ['class' => 'field']) }}
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 form-group">
				{!! Form::label('colorgpx', 'Color') !!}
			    {!! Form::color('colorgpx[]', null, ['class' => 'form-control', 'type' => 'color']) !!}
			</div>
		</div>
	</div>
	
	
</fieldset>
<div class="clearfix"></div>

<div class="ln_solid"></div>
<table class="table table-striped table-bordered dt-responsive nowrap" id="grupodispositivogpx-table"  cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Url</th>
            <th>Color</th>
            <th>Estado</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
    	@if (isset($grupogpx))
    		@foreach ($grupogpx as $key => $value) 
    			<tr idelement="{{$value['id']}}">
    				<td>{{$value['id']}}</td>
    				<td>{{$value['url']}}</td>
    				<td><input type="color" value="{{$value['color']}}" /></td>
    				<td>
	    				<select data-live-search="true" class="form-control selectpicker estadogpx">
	    					<option value="0" @if($value['estado'] == '0') {{'selected'}} @endif >Inactivo</option>
	    					<option value="1" @if($value['estado'] == '1') {{'selected'}} @endif>Activo</option>	
	    				</select>
    				</td>
    				<td>{{$value['updated_at']}}</td>
    			</tr>
    		
    		@endforeach
    	@endif
    </tbody>
</table>
<input type="hidden" name="jsongrupogpx" value="{{json_encode($grupogpx)}}" id="jsongrupogpx">
