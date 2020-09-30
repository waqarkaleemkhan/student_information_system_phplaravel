@extends('layouts.app')


@section('content')


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Register Admin IIUI</title>
        
        <!-- Bootstrap core CSS -->
        <link href="/dist/css/bootstrap.css" rel="stylesheet">
        
        <!-- Boostrap Theme -->
        <link href="/css/theme-base.css" rel="stylesheet">
        <link href="/css/boostrap-overrides.css" rel="stylesheet">
        <link href="/css/theme.css" rel="stylesheet">
        
        <!-- Ez mark-->
        <link rel="stylesheet" href="/assets/css/ezmark.css">
        
        <!-- Font Awesome-->
        <link href="/assets/css/font-awesome.css" rel="stylesheet">
        
        <!-- Animate-->
        <link href="/assets/css/animate-custom.css" rel="stylesheet">
        
        <!-- Bootstrap core JavaScript -->
        <script src="/assets/js/jquery.js"></script>
        <script src="/dist/js/bootstrap.js"></script>
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->

  </head>
  <body class="bg-med">

        <div id="login" class="container">
    		<div class="row center-panel ">
       			 <div class="col-xs-12 col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4 text-center">
                        <div class="col-lg-12 gray-lighter-bg animated fadeInDown panel-body-only custom-check">

                             <form class="form-signin" method="POST" action="{{ url('admin/admin_auth/a_registered') }}">
                             {{ csrf_field() }}
                                    <h1 class="text-center">Sign Up</h1> <br>
                            		<!-- Name -->
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                    <div class="input-group">
                                     		 <span class="input-group-btn">
                                        		<button class="btn btn-default" type="button"><i class="icon-user text-transparent"></i></button>
                                     		 </span>
                                      		 <input id="name" type="text" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}"  required autofocus>
                                    	</div><!-- /input-group -->
                                        @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                     				</div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                    <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="icon-envelope text-transparent"></i></button>
                                            </span>
                                            <input id="email" type="email" name="email" class="form-control" placeholder="Your Email" value="{{ old('email') }}"  required autofocus>
                                        </div><!-- /input-group -->
                                        @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                    <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="icon-key text-transparent"></i></button>
                                            </span>
                                            <input id="password" type="password" name="password" class="form-control" placeholder="Your Password" value="{{ old('password') }}"  required autofocus>
                                        </div><!-- /input-group -->
                                        @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-xs-12">
                                    <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="icon-key text-transparent"></i></button>
                                            </span>
                                            <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                   
                                    
                                    
                                      <div class="col-sm-12">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                                             Register
                                        </button>
                                      </div>

                              </form>
                              <div class="clearfix"></div>
                              <br>
                        </div>
            	 	
                 	
               </div>
        	</div>
  		 </div>
    
        <!-- Plugins & Custom -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- EzMark -->
        <script src="/assets/js/jquery.ezmark.js"></script>
        <script type="text/javascript">
			$(function() {
				$('.custom-check input').ezMark()
			});	
		</script>
        
		<!-- Custom -->
		<script src="/assets/js/script.js"></script>

  </body>
 </html>

@endsection
