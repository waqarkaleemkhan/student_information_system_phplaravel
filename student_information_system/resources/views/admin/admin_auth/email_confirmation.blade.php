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

                             <form  method="POST" action="{{ url('admin/admin_auth/confirmedadmin') }}">
                             {{ csrf_field() }}
                                    <h1 class="text-center">Account Confirmation</h1> <br>
                            		<!-- Name -->
                                

                               

                                @if(Session::has('message'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
                                @endif
                                <div class="form-group">
                                    <div class="col-xs-12">
                                    <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="icon-key text-transparent"></i></button>
                                            </span>
                                            <input type="number" name="r_number" class="form-control" placeholder="Enter 6 digits code for confirmation" required autofocus>
                                            
                                   
                                                <input type="hidden" name="name" value="{{$admin['name']}}">
                                                <input type="hidden" name="email" value="{{$admin['email']}}">
                                                <input type="hidden" name="password" value="{{$admin['password']}}">
                                          
                                            
                                        </div>
                                    </div>
                                </div>
                                   
                                    <br><br>
                                    <div class="clearfix"></div>
                                <div class="form-group">
                                      <div class="col-sm-3">
                                      </div>
                                      <div class="col-sm-6">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                                             Verify
                                        </button>
                                      </div>
                                      <div class="col-sm-3">
                                      </div>
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
