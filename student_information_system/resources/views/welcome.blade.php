



<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>IIUI - Student Information System</title>
        
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

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #f4f4f6;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

  </head>
  <body class="bg-med">
    
  <div class="flex-center position-ref full-height">
    
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Student Home</a>
                    @else
                        <a href="{{ url('/login') }}">Student Login</a>
                        
                    @endif    
                    <a href="{{ url('/admin/home') }}">Admin</a>

                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
						  <ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
							<li data-target="#myCarousel" data-slide-to="3"></li>
							<li data-target="#myCarousel" data-slide-to="4"></li>
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner">
							<div class="item active">
							  <img src="img\iiui-1.jpg" alt="Los Angeles">
							</div>

							<div class="item">
							  <img src="img\iiui-2.jpg" alt="Chicago">
							</div>

							<div class="item">
							  <img src="img\iiui-3.jpg" alt="New York">
							</div>
							
							<div class="item">
							  <img src="img\iiui-4.jpg" alt="New York">
							</div>
							
							<div class="item">
							  <img src="img\iiui-5.jpg" alt="New York">
							</div>
							
							
						  </div>

						  <!-- Left and right controls -->
						  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						  </a>
						</div>


                </div>

                <div class="links">
                    <a href="http://iiu.edu.pk/default.htm" target="_blank">IIUI Official</a>
                    <a href="http://admission.iiu.edu.pk/" target="_blank">IIUI Admissions</a>
                    <a href="http://vle.iiu.edu.pk/" target="_blank">IIUI VLE Portal</a>
                    <a href="http://usis.iiu.edu.pk:64453/" target="_blank">IIUI Hostels</a>
                    
                </div>
            </div>
        </div>
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