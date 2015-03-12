@extends('layouts.app_auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{!! route('show_dashboard') !!}" class="logo"><b>Stats</b>App</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            @include('flash::message')
            <p class="login-box-msg">Sign in to start your session</p>
            {!! Form::open(['route' => 'session_store']) !!}
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
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        {{ $error or '' }}
                        {!! Form::submit('Sign In', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
                    </div><!-- /.col -->
                </div>
            {!! Form::close() !!}

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{!! route('facebook_login') !!}" class="btn btn-block btn-social btn-facebook btn-flat"><i
                            class="fa fa-facebook"></i> Sign in using Facebook</a>
                <a href="{!! route('google_plus_login') !!}" class="btn btn-block btn-social btn-google-plus btn-flat"><i
                            class="fa fa-google-plus"></i> Sign in using Google+</a>
                <a href="{!! route('github_login') !!}" class="btn btn-block btn-social btn-github btn-flat"><i
                            class="fa fa-github"></i> Sign in using GitHub</a>
            </div><!-- /.social-auth-links -->

            <a href="#">I forgot my password</a><br>
            <a href="register.html" class="text-center">Register a new membership</a>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection
