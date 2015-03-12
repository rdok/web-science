@extends('layouts.app_auth')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="{!! route('show_dashboard') !!}" class="logo"><b>Stats</b>App</a>
        </div>

        <div class="register-box-body">
            @include('flash::message')
            <p class="login-box-msg">Register a new membership</p>

            {!! Form::open(['route' => 'register_store']) !!}
                <div class="form-group {{  $errors->has('name') ? 'has-error' : ''}} has-feedback">
                    {!! $errors->first('name', '<label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> :message</label>') !!}
                    {!! Form::input('text', 'name', null, ['placeholder' => 'Name', 'class' => 'form-control',
                        'id' => 'name']) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group {{  $errors->has('username') ? 'has-error' : ''}} has-feedback">
                    {!! $errors->first('username', '<label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> :message</label>') !!}
                    {!! Form::input('text', 'username', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group {{  $errors->has('email') ? 'has-error' : ''}} has-feedback">
                    {!! $errors->first('email', '<label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> :message</label>') !!}
                    {!! Form::input('email', 'email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group {{  $errors->has('password') ? 'has-error' : ''}} has-feedback">
                    {!! $errors->first('password', '<label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> :message</label>') !!}
                    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group @if($errors->has('password')) has-error @endif has-feedback">
                    {!! $errors->first('password', '<label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> :message</label>') !!}
                    {!! Form::password('password_confirmation', ['placeholder' => 'Retype password', 'class' => 'form-control']) !!}
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        {!! Form::submit('Register', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
                    </div>
                    <!-- /.col -->
                </div>
            {!! Form::close() !!}

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{!! route('facebook_login') !!}" class="btn btn-block btn-social btn-facebook btn-flat"><i
                            class="fa fa-facebook"></i> Sign up using Facebook</a>
                <a href="{!! route('google_plus_login') !!}" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i>
                    Sign up using Google+</a>
                <a href="{!! route('github_login') !!}" class="btn btn-block btn-social btn-github btn-flat"><i class="fa fa-github"></i>
                    Sign up using GitHub</a>
            </div>

            <a href="login.html" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

@endsection
