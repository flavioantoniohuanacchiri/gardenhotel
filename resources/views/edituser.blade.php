@extends('layouts.blank')

@push('stylesheets')
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <h1 class="">Editar Datos de Usuario</h1>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/editardatos') }}">
                {{ csrf_field() }}
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="col-md-6">
                                <label>Nombre</label>
                                <input class="form-control" type="text" value="{{ Auth::user()->name }}" name="nombre" />
                            </div>
                            <div class="col-md-6">
                                <label>Contraseña</label>
                                <input class="form-control" type="password" value="" name="contrasena" />
                            </div>
                            <input class="btn btn-primary" type="submit" name="" value="Actualizar">
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
        <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
@endsection