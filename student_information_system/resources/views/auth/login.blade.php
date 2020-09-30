@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login IIUI</title>
        
        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.css" rel="stylesheet">
        
        <!-- Boostrap Theme -->
        <link href="css/theme-base.css" rel="stylesheet">
        <link href="css/boostrap-overrides.css" rel="stylesheet">
        <link href="css/theme.css" rel="stylesheet">
        
        <!-- Ez mark-->
        <link rel="stylesheet" href="assets/css/ezmark.css">
        
        <!-- Font Awesome-->
        <link href="assets/css/font-awesome.css" rel="stylesheet">
        
        <!-- Animate-->
        <link href="assets/css/animate-custom.css" rel="stylesheet">
        
        <!-- Bootstrap core JavaScript -->
        <script src="assets/js/jquery.js"></script>
        <script src="dist/js/bootstrap.js"></script>
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->

  </head>
  <body class="bg-med">
    
        <div id="login" class="container">
    		<div class="row center-panel ">
       			 <div class="col-sm-6 col-md-4 col-md-offset-4 text-center">
                        <div class="col-lg-12 gray-lighter-bg animated fadeInDown panel-body-only custom-check">
                            @if(session('status'))
                            {{session('status')}}
                            @endif
                            <div class="avatar avatar-md"><img src="img/user.jpg" alt="Ryan" class="img-circle" width="100"></div>
                                <form class="form-signin" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                        <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    
                                        <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                   
                                </div>
                                

                                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                                         <span class="icon-user text-transparent"></span>&nbsp;&nbsp;&nbsp;Sign in
                                    </button>
                                    <label class="checkbox pull-left">
                                    <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                </label>
                                            </div>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="pull-right">Forgot Your Password? </a>
                                </form><span class="clearfix"></span>
                      </div>
               </span></div>
        	</div>
  		 </div><span class="clearfix">
    
        <!-- Plugins & Custom -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- EzMark -->
        <script src="assets/js/jquery.ezmark.js"></script>
        <script type="text/javascript">
			$(function() {
				$('.custom-check input').ezMark()
			});	
		</script>
        
		<!-- Custom -->
		<script src="assets/js/script.js"></script>

  </span></body>
 </html>
@endsection
