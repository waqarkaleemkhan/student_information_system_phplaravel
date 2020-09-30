<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>IIUI-profile Information System</title>
        <link rel="shortcut icon" href="/img/iiui.jpg" type="image/x-icon">

        <!-- Bootstrap core CSS -->
        <link href="/dist/css/bootstrap.css" rel="stylesheet"/>
        
        <!-- Boostrap Theme -->
        <link id="skinCss" href="/css/theme-base.css" rel="stylesheet"/>
        <link href="/css/boostrap-overrides.css" rel="stylesheet"/>
        <link id="themeCss" href="/css/theme.css" rel="stylesheet"/>
        
        <!-- Add custom CSS here -->
        <link href="/assets/css/sidebar.css" rel="stylesheet"/>
        
        <!-- Plugins -->
        <link href="/assets/css/font-awesome.css" rel="stylesheet"/>
        <link rel="stylesheet" href="/assets/css/ezmark.css"/>
        <link href="/assets/plugins/morris.js-0.4.3/morris.css" rel="stylesheet">
    	<link href="/assets/css/animate-custom.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/assets/plugins/calendar/zabuto_calendar.css">
		<link rel="stylesheet" type="text/css" href="/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css">
        <link href="/assets/css/pushy.css" rel="stylesheet"/>
        <link href="/assets/css/panel.css" rel="stylesheet"/>
		<link rel="/stylesheet" href="assets/weather-icons/weather-icons.css">
        <link href="/assets/select/select2.css" rel="stylesheet"/>
        <link rel="stylesheet" media="screen" type="text/css" href="/colorPicker/colpick/css/colpick.css" />

    </head>
    <body>
 
    
        <!-- Container that wraps all content that gets "pushed" when chat panel shows-->
        <div id="container"> 
            <!-- Top Navbar  -->
            <div class="navbar navbar-static-top navbar-default " role="navigation">
                <div class="navbar-header navbar-inverse text-center">
                    <button type="button" class="navbar-toggle border-left-med no-radius" id="menu-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <button type="button" class="navbar-toggle border-left-med no-radius" id="user-menu" data-toggle="collapse" >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="avatar"><img src="/img/usersm.jpg" alt="Ryan" class="img-circle"></span>
                    </button>
                <!-- logo -->
                <div class="navbar-brand"><a class="isDisabled" style="font-size:14px; pointer-events: none;"> <img src="/img/logo.png" alt="logo"></a></div>
                <!-- / logo -->
                </div>
                <!-- user -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
				
                    <ul class="nav navbar-nav navbar-right navbar-user">
          
                        <li class="avatar dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/img/usersm.jpg" alt="Ryan" class="img-circle nav-avatar"><span class="username">{{ Auth::user()->name.' '.Auth::user()->lastname }}</span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="divider"></li>
                                <li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();" class="logout_a"><i class="icon-power-off"></i> Log Out</li></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        
                            </ul>
                        </li>
                    </ul>
                </div><!-- / nav-collapse -->
            </div>

            <!-- / top Navbar -->
            <!-- Wrapper for content below nav bar -->
            <div id="wrapper">
                <!-- Sidebar -->
                    
                <div class="sidebar-back"></div>
                <div id="sidebar-wrapper" class="stretch-full-height">
                    <ul class="sidebar-nav">

                        <li class="nav-header" id="uiMenu"> 
                            <a href="#" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-user icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Profiles</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="uiMenus">
                                <li><a href="{{ url('admin/home') }}" style="color: #ffffff;">Student Profiles</a></li>
                                <li><a href="{{ url('/create') }}" style="color: #ffffff;">Create Profile</a></li>
                            </ul>
                        </li>

                        <li id="cards">
                            <a href="{{ url('admin/cards') }}" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-credit-card icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Cards</span></a>            
                        </li>

                        <li> 
                            <a href="#" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-time icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Sessions</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="uiMenus">
                                <li><a href="{{ url('admin/managesessions') }}" style="color: #ffffff;">Manage Sessions</a></li>
                                <li><a href="{{ url('admin/addsession') }}" style="color: #ffffff;">Add Session</a></li>
                            </ul>
                        </li>

                        <li> 
                            <a href="#" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-book icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Courses</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="uiMenus">
                                <li><a href="{{ url('admin/managecourse') }}" style="color: #ffffff;">Manage Course</a></li>
                                <li><a href="{{ url('admin/addcourse') }}" style="color: #ffffff;">Add Course</a></li>
                            
                            </ul>
                        </li>

                        <li> 
                            <a href="#" class="active-title">
                                <span class="nav-icon"><i class="icon-euro icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Fees Schema</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="uiMenus">
                                <li><a href="#" class="active" style="color: #ffffff;">Fees Detals</a></li>
                                <li><a href="{{ url('admin/addfee') }}" style="color: #ffffff;">Add Fees</a></li>
                            </ul>
                        </li>

                        <li> 
                            <a href="#" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-dollar icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Student Fees</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="uiMenus">
                                <li><a href="{{ url('admin/studentfee') }}" style="color: #ffffff;">Student Fee</a></li>
                                <li><a href="{{ url('admin/addstudentfee') }}" style="color: #ffffff;">Add Student Fees</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="{{ url('admin/attendance') }}" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-group icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Attendance</span></a>            
                        </li>

                        <li>
                            <a href="{{ url('admin/results') }}" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-check icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Results</span></a>            
                        </li>

                        <li>
                            <a href="{{ url('admin/changepassword') }}" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-key icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Change Password</span></a>            
                        </li>

                        <li>
                            <a href="{{ url('admin/reports') }}" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-file icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Reports</span></a>            
                        </li>

                        <li> 
                            <a href="#" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-file icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Reporter</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="uiMenus">
                                <li><a href="{{ url('admin/coursereporter') }}" style="color: #ffffff;">Course Reporter</a></li>
                                <li><a href="{{ url('admin/feereporter') }}" style="color: #ffffff;">Fees Reporter</a></li>
                                <li><a href="{{ url('admin/resultreporter') }}" style="color: #ffffff;">Result Reporter</a></li>
                            </ul>
                        </li>
                
                    </ul>
                </div>
                <!-- /sidebar -->
                <!-- Keep all page content within the page-content-wrapper -->
                <div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
 				
                 <div class="container">
                    <br>
                    <div class="row text-center">
                        <legend><span><i class="icon-euro"></i></span> Fee Details </legend>
                    </div>
                    <br>

                    @if(session('info'))
                        <div class="alert alert-success col-md-6">
                            {{session('info')}}
                        </div>
                        @endif
                        <br>
                    
                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th for="id">#</th>
                                <th for="pro">Program</th>
                                <th for="sname">Session Name</th>
                                <th for="fch">Fees/Credit_Hour</th>
                                <th for="rf">Registration Fees</th>
                                <th for="oth">Others</th>
                                <th for="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($fees) > 0)
                                @foreach($fees->all() as $fee)
                                    <tr class="success">
                                        <td name="id">{{ $fee->id }}</td>
                                        <td name="pro"><b>{{ $fee->program }}</b></td>
                                        <td name="sname"><b>{{ $fee->session_name }}</b></td>
                                        <td name="fch">{{ $fee->ch_fee }}</td>
                                        <td name="rf">{{ $fee->reg_fee }}</td>
                                        <td name="oth">{{ $fee->others }}</td>
                                        <td name="action">
                                            <a href='{{ url("admin/editfee/{$fee->id}") }}' class="label label-success">Edit Schema</a>
                                            <a href='{{ url("admin/deletefee/{$fee->id}") }}' class="label label-danger">Delete Schema</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        </table> 
                    
                </div>
				
                </div><!-- /page-content-wrapper -->
                
            </div><!-- / wrapper for content below nav bar -->
        </div><!-- end container for chat panel push-->


        <!-- JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- Theme Core -->
        <script src="/assets/js/jquery.js"></script>
        <script src="/assets/js/chat.js"></script>
        <script src="/assets/js/modernizr-2.6.2.min.js"></script>
        
        <script src="/dist/js/bootstrap.js"></script>
        <script type="text/javascript" src="/assets/js/jquery-ui-1.10.4.custom.min.js"></script>

        <!-- Pushy JS --> 
        <script src="/assets/js/pushy.js"></script>

		<!-- Zabuto Calendar -->
		<script src="/assets/plugins/calendar/zabuto_calendar.js"></script>
        <script type="application/javascript">
                                        $(document).ready(function () {
                                            $("#date-popover").popover({html: true, trigger: "manual"});
                                            $("#date-popover").hide();
                                            $("#date-popover").click(function (e) {
                                                $(this).hide();
                                            });
                                        
                                            $("#my-calendar").zabuto_calendar({
                                                action: function () {
                                                    return myDateFunction(this.id, false);
                                                },
                                                action_nav: function () {
                                                    return myNavFunction(this.id);
                                                },
                                                ajax: {
                                                    url: "show_data.php?action=1",
                                                    modal: true
                                                },
                                                legend: [
                                                    {type: "text", label: "Special event", badge: "00"},
                                                    {type: "block", label: "Regular event", }
                                                ]
                                            });
                                        });
                                        
                                        function myDateFunction(id, fromModal) {
                                            $("#date-popover").hide();
                                            if (fromModal) {
                                                $("#" + id + "_modal").modal("hide");
                                            }
                                            var date = $("#" + id).data("date");
                                            var hasEvent = $("#" + id).data("hasEvent");
                                            if (hasEvent && !fromModal) {
                                                return false;
                                            }
                                            $("#date-popover-content").html('You clicked on date ' + date);
                                            $("#date-popover").show();
                                            return true;
                                        }
                                        
                                        function myNavFunction(id) {
                                            $("#date-popover").hide();
                                            var nav = $("#" + id).data("navigation");
                                            var to = $("#" + id).data("to");
                                            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
                                        }
                                    </script>
        <!-- Sparkline -->
		<script src="/assets/js/jquery.sparkline.js"></script>
        
        <!-- EzMark -->
        <script src="/assets/js/jquery.ezmark.js"></script>
        <script src="/assets/select/select2.js"></script>
       
        <script type="text/javascript">
			$(function() {
				$('.custom-check input').ezMark()
			});	
		</script>
        
        <!-- Canvas.js-->
        <script src="/assets/plugins/canvas/canvasjs.min.js"></script>
        <!-- ColorPicker -->
		<script type="text/javascript" src="/colorPicker/colpick/js/colpick.js"></script>
        <script type="text/javascript" src="/colorPicker/colpick/js/colpick-implem.js"></script>
        
        <!-- Custom -->
        <script src="/assets/js/sidebar-navbar.js"></script>
        <script src="/assets/js/script.js"></script>
        <script src="/assets/js/chart-data.js"></script>
                
        <!-- Google Maps -->
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="/assets/js/gmap3.js"></script>  
        <script src="/assets/js/gmap.custom-index-map.js"></script>
        
        <!-- Font Awesome Markers -->
		<script src="/assets/plugins/fontawesome-markers-master/fontawesome-markers.js"></script>
        
        <!-- Easy Pie Charts -->
		<script type="text/javascript" src="/assets/plugins/jquery-easy-pie-chart/examples/excanvas.js"></script>
        <script type="text/javascript" src="/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
	   
        <!-- Initialize Carousel-->
		<script>$('.carousel').carousel({
			  interval: 7000
			})
		 </script>
        <!-- Flot -->
        <script type="text/javascript" src="/assets/plugins/flot/jquery.flot.js"></script>
        <script type="text/javascript" src="/assets/plugins/flot/jquery.flot.resize.js"></script>

    </body>
</html>
