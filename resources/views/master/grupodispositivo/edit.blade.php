@extends('layouts.blank')

@push('scripts')
@include('master/grupodispositivo/js')
@endpush

@section('main_container')

<!-- page content -->
<div class="right_col" role="main">

        <h1 class="text-uppercase">{{ trans('master.edit module', ['module' => $grupo->nombre ]) }}</h1>

        <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                                <div class="x_content">

                                        {!! Form::model($grupo,['method' => 'PATCH', 'route'=>['grupodispositivo.update',$grupo->id], 'class'=> 'form-horizontal', 'files' => true]) !!}

                                        @include('master/grupodispositivo/_form')

                                        <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                        {!! link_to('grupodispositivo', trans('master.cancel'), ['class' => 'btn btn-primary']) !!}
                                                        {!! Form::submit(trans('master.save'),['class' => 'btn btn-info'])  !!}
                                                </div>
                                        </div>

                                        {!! Form::close() !!}

                                </div>
                        </div>
                </div>
        </div>

</div>
<!-- /page content -->

@include('includes/footer')
@endsection