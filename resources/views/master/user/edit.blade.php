@extends('layouts.blank')

<?php
       /* if (isset($row->perfils)) {
                $jsonData = $row->perfils;
        }*/
?>

@push('scripts')

@include('master/user/js_form')

@endpush

@section('main_container')

<!-- page content -->
<div class="right_col" role="main">

        <h1 class="text-uppercase">{{ trans('master.edit module', ['module' => $user['name'] ]) }}</h1>

        <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                                <div class="x_content">

                                        {!! Form::model($user, ['method' => 'PATCH', 'route'=>['user.update',$user['id']], 'class'=> 'form-horizontal']) !!}

                                        @include('master/user/_form')

                                        <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                        {!! link_to('user', trans('master.cancel'), ['class' => 'btn btn-primary']) !!}
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