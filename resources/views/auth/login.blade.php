@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><img style="width: 70px; height: 70px;" src="./img/merin.jpg" alt="lead logo">
        <b style="color: #5a055b;">Merin Pharmacy</b></a>
    </div>
    <!-- /.login-logo -->

    <div class="login-box-body" style="background-color:#FFFFFF;  border-style: solid;
    border-width: 3px;">
        <h5 class="login-box-msg" style="color: #143d3d" >Sign In</h5>
    
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group has-feedback">
                <input id="email" type="email" placeholder="Email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                
            </div>
            <div class="form-group has-feedback">
                <input id="password" type="password" placeholder="Password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row float-right">
                <div class="col-xs-12">
                <button type="submit" class="btn btn-info btn-block btn-flat" style="background-color:#5a055b ">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </form>

    </div>

        <div align="center">
            <b>Developed By</b> <a href="https://www.facebook.com/solidscript/">Solid Script Web Systems</a>
        </div>
        
 

</div>
@endsection


