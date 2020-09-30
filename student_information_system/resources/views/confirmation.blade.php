<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>IIUI-course Information System</title>
    <link rel="shortcut icon" href="img/iiui.jpg" type="image/x-icon">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
<div class="row">
    <div class="wrapper col-md-12">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h6 style="font-size:15px">course Information System</h6>
                <strong>IIUI</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a class="isDisabled" style="font-size:14px; pointer-events: none;">
                        <i class="fas fa-user"></i>
                        course Profile
                        <i class="fas fa-check-circle"></i>
                    </a>
                    
                </li>
                <li>
                    <a href="#" style="font-size:14px; pointer-events: none;">
                        <i class="fas fa-briefcase"></i>
                        Confirmation
                    </a>
                </li>
            </ul>

            
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-inverse">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-success">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <span class="username">{{ Auth::user()->name.' '.Auth::user()->lastname }}</span>
                                        <b class="caret"></b>
                                    </a>
                        <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          
                            <a href="{{ route('logout') }}"  onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();" class="logout_a"><i class="fas fa-key"></i> Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                          </li>
                          @endif
                        </ul>
                    </div>
                </div>
            </nav>
            

                            
            <div class="container">
				<div class="row">

                    <label class="col-md-12 control-label"><h5><span> <i class="fas fa-check-circle"></i>course Confirmation<span></h5></label>
                    
                

					<div class="col-md-9">
                        <!--code here-->
                        <table>
                            
                        </table>
					</div>
				</div>
			</div>
                            
           

        </div>
    </div>
	</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>


            <script>
                 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
            </script>
     



</body>

</html>