<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" name="user[password]" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        @if ($errors->has('password'))
        <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <input type="password" name="user[password_confirmation]" class="form-control" placeholder="Confirm password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        @if ($errors->has('password_confirmation'))
        <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
        @endif
</div>

<div class="clearfix"></div>