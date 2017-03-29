@extends('layouts.blank')

@section('main_container')

<!-- page content -->
<div class="right_col" role="main">

        <h1 class="text-uppercase">{{ trans('master.edit module', ['module' => $grupo->nombre ]) }}</h1>

        <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                                <div class="x_content">
                                        @if(isset($errors))
                                            @foreach ($errors as $key => $value)
                                                <div style="background: red;color: #fff;padding: 8px;font-size: 14px;font-weight: 700;">
                                                    {{$value}}    
                                                </div>
                                            @endforeach
                                        @endif
                                        {!! Form::model($grupo,['method' => 'PATCH', 'route'=>['grupodispositivo.update',$grupo->id], 'class'=> 'form-horizontal', 'files' => true]) !!}

                                        @include('master/grupodispositivo/_form')
                                        @include('master/grupodispositivo/_form_gpx_dispositivos')

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
@push('scripts')
@include('master/grupodispositivo/js')
@endpush
@include('includes/footer')
@endsection