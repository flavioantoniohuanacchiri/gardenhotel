@extends('layouts.blank')

@push('scripts')
@endpush

@section('main_container')
  <div class="right_col" role="main">

    <h1 class="text-uppercase">Hoteles</h1>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Datos de la página</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content col-lg-9">
            <div class="col-lg-9 form-group">
              <label for="">
                Titulo:
              </label>
              <input type="text" class="form-control">
            </div>
            <div class="col-lg-9 form-group">
              <label for="">
                Titulo (en):
              </label>
              <input type="text" class="form-control">
            </div>
            <div class="col-lg-9 form-group">
              <label for="">
                Descripión:
              </label>
              <textarea type="text" class="form-control"></textarea>
            </div>
            <div class="col-lg-9 form-group">
              <label for="">
                Descripión (en):
              </label>
              <textarea type="text" class="form-control"></textarea>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Banners</h2>
            <div class="clearfix"></div>
          </div>
          <div class="col-lg-9">
            <a href="#" class="btn btn-primary">+ Nuevo Banner</a>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li>
                <a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>

            <div class="x_content" style="margin-top: 20px">

            <table class="table table-striped table-bordered dt-responsive nowrap" id="granja-table"  cellspacing="0" width="100%">
              <thead>
              <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Codigo</th>
                <th>Direccion</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
              </tr>
              </thead>
            </table>

          </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection