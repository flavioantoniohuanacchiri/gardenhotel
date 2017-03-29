<div class="clearfix"></div>
<div class="ln_solid"></div>
<fieldset>
    <legend>Dispositivos</legend>
    <div class="col-md-4 col-sm-4 col-xs-4 form-group">
        <a class="btn-agregar-dispositivo"><i class="fa fa-plus btn-primary btn"></i></a>
        <a class="btn-eliminar-dispositivo"><i class="fa fa-minus btn-danger btn"></i></a>
    </div>
    <div class="contenedor-dispositivos">
        <div class="col-md-12 col-sm-12 col-xs-12 filadispositivo">
            <div class="col-md-4 col-sm-4 col-xs-4 form-group">
                 {!! Form::label('codigo', 'Código') !!}
                 {!! Form::text('dispositivo[codigo][]', '', ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 form-group">
                {!! Form::label('descripcion', 'Descripcion') !!}
                {!! Form::text('dispositivo[descripcion][]', '', ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 form-group">
                 {!! Form::label('estado', 'Estado') !!}
                 {!! Form::select('dispositivo[estado][]', [ '1' => 'ACTIVO', '0' => 'INACTIVO'], null, ['class' => 'form-control selectpicker', 'data-live-search' => true]) !!}
            </div>
        </div>
    </div>
</fieldset>

<div class="clearfix"></div>

<div class="ln_solid"></div>
<table class="table table-striped table-bordered dt-responsive nowrap" id="dispositivo-table"  cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Código</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Updated At</th>
            <th>[]</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($dispositivos))
            @foreach ($dispositivos as $key => $value) 
                <tr idelement="{{$value['id']}}">
                    <td>{{$value['id']}}</td>
                    <td>{{$value['codigo']}}</td>
                    <td>{{$value['descripcion']}}</td>
                    <td>
                        <select data-live-search="true" class="form-control selectpicker estadodispositivo">
                            <option value="0" @if($value['estado'] == '0') {{'selected'}} @endif >Inactivo</option>
                            <option value="1" @if($value['estado'] == '1') {{'selected'}} @endif>Activo</option>    
                        </select>
                    </td>
                    <td>{{$value['updated_at']}}</td>
                    <td><a data-id="{{$value['id']}}" data-url="dispositivo" class="btn btn-xs btn-danger masterDelete"><i class="fa fa-trash"></i></a></td>
                </tr>
            
            @endforeach
        @endif
    </tbody>
</table>

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
            <th>[]</th>
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
                    <td><a data-id="{{$value['id']}}" data-url="grupodispositivogpx" class="btn btn-xs btn-danger masterDelete"><i class="fa fa-trash"></i></a></td>
    			</tr>
    		
    		@endforeach
    	@endif
    </tbody>
</table>
<input type="hidden" name="jsongrupogpx" value="{{json_encode($grupogpx)}}" id="jsongrupogpx">
<input type="hidden" name="jsondispositivo" value="{{json_encode($dispositivos)}}" id="jsondispositivo">
<input type="hidden" name="" id="urlpath" value="{{URL::to('/')}}">