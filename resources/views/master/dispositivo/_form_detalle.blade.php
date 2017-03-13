<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-dispositivo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">


      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Dispositivo</h4>
      </div>


      <div class="modal-body">
        <div class="row-fluid">
          {!! Form::open(['url' => route('dispositivo.store'), 'class'=> 'form-horizontal', 'id' => 'form-dispositivo', 'files' => true]) !!}
          <div class="col-md-12">
            @include('master/dispositivo/_form')
          </div>
          <div class="col-md-12">
            <div class="col-md-3 col-sm-12 col-xs-3 pull-right">
                {!! Form::submit(trans('master.add'),['class' => 'btn btn-info pull-right form-control'])  !!}
            </div>
          </div>
          {!! Form::close() !!}
        </div>
        <div class="clearfix"></div>
        <div class="ln_solid"></div>
      </div>


      <div class="modal-footer">
        <!-- 
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('master.back') }}</button>
        <button type="button" class="btn btn-primary">{{ trans('master.add') }}</button>
        -->
      </div>

    </div>
  </div>
</div>