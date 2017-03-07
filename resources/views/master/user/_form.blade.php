<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('user[name]', $user['name'], ['class' => 'form-control', 'id' => 'name', 'required' => 'required']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('user[email]', $user['email'], ['class' => 'form-control', 'id' => 'email', 'required' => 'required']) !!}
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('user[password]', ['class' => 'form-control', 'id' => 'password']) !!}
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group">
        {!! Form::label('password_confirmation', 'Confirmar password') !!}
        {!! Form::password('user[password_confirmation]', ['class' => 'form-control', 'id' => 'password_confirmation']) !!}
</div>

{!! Form::hidden('perfil[data]', '', ['id' => 'perfil-data']) !!}   

<div class="clearfix"></div>
<div class="ln_solid"></div>

@include('includes/error_list')

<div class="x_panel">
        <div class="x_title">
                Opciones de Usuario
        </div>
        <div class="x_content">
                <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group">
                                        {!! Form::label('perfil-nombre', 'Perfil', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                                {!! Form::select('perfil[id]', $perfiles, $user['idperfil'], ['class' => 'form-control', 'id' => 'perfil-nombre', 'required' => 'required']) !!}
                                        </div>
                                </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group">
                                        {!! Form::label('sede-nombre', 'Sede / Local', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                            <ul>
                                                 @if (count($sedes) > 0 )
                                                   @foreach($sedes as $key => $value)
                                                      @if (isset($sedesseleccionados[$key]))
                                                        <li><input type="checkbox" name="sedes[]" value="{{$key}}" checked="" />{{$value}}</li>
                                                      @else
                                                        <li><input type="checkbox" name="sedes[]" value="{{$key}}" />{{$value}}</li>
                                                       @endif
                                                   @endforeach
                                                @endif    
                                            </ul>
                                        </div>
                                </div>
                        </div>
                        <!--
                        <div class="col-md-4 col-sm-4 col-xs-12">
                                <button type="button" id="addRowUserPerfilTable" class="btn btn-default">{!! trans('master.add')  !!}</button>
                        </div> -->
                </div>
                <!--
                <table class="table table-striped table-bordered dt-responsive nowrap" id="user-perfil-table"  cellspacing="0" width="100%">
                        <thead>
                                <tr>
                                        <th>Id</th>
                                        <th>Perfil</th>
                                        <th>Action</th>                               
                                </tr>
                        </thead>
                </table> -->
        </div>
</div>

<div class="clearfix"></div>
<div class="ln_solid"></div>