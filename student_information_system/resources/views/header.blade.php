<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>IIUI-Student Information System</title>
        <link rel="shortcut icon" href="img/iiui.jpg" type="image/x-icon">

        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.css" rel="stylesheet"/>
        
        <!-- Boostrap Theme -->
        <link id="skinCss" href="css/theme-base.css" rel="stylesheet"/>
        <link href="css/boostrap-overrides.css" rel="stylesheet"/>
        <link id="themeCss" href="css/theme.css" rel="stylesheet"/>
        
        <!-- Add custom CSS here -->
        <link href="assets/css/sidebar.css" rel="stylesheet"/>
        
        <!-- Plugins -->
        <link href="assets/css/font-awesome.css" rel="stylesheet"/>
        <link rel="stylesheet" href="assets/css/ezmark.css"/>
        <link href="assets/plugins/morris.js-0.4.3/morris.css" rel="stylesheet">
    	<link href="assets/css/animate-custom.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/plugins/calendar/zabuto_calendar.css">
		<link rel="stylesheet" type="text/css" href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css">
        <link href="assets/css/pushy.css" rel="stylesheet"/>
        <link href="assets/css/panel.css" rel="stylesheet"/>
		<link rel="stylesheet" href="assets/weather-icons/weather-icons.css">
        <link href="assets/select/select2.css" rel="stylesheet"/>
        <link rel="stylesheet" media="screen" type="text/css" href="colorPicker/colpick/css/colpick.css" />

    </head>
    <body>
 

  

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
                        <span class="avatar"><img src="img/avatar.jpg" alt="Ryan" class="img-circle"></span>
                    </button>
                <!-- logo -->
                <div class="navbar-brand"><a href="index.html"> <img src="img/logo.png" alt="logo"></a></div>
                <!-- / logo -->
                </div>
                <!-- user -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
				
                    <ul class="nav navbar-nav navbar-right navbar-user">
          
		  
                        <li class="avatar dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/avatar.jpg" alt="Ryan" class="img-circle nav-avatar">Welcome Ryan!<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="user-profile.html"><i class="icon-user"></i> Profile</a></li>
                                <li><a href="email.html"><i class="icon-envelope"></i> Inbox</a></li>
                                <li><a href="#"><i class="icon-gear"></i> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html"><i class="icon-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- / nav-collapse -->
            </div>


        <!-- JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- Theme Core -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/chat.js"></script>
        <script src="assets/js/modernizr-2.6.2.min.js"></script>
        
        <script src="dist/js/bootstrap.js"></script>
        <script type="text/javascript" src="assets/js/jquery-ui-1.10.4.custom.min.js"></script>

        <!-- Pushy JS --> 
        <script src="assets/js/pushy.js"></script>

		<!-- Zabuto Calendar -->
		<script src="assets/plugins/calendar/zabuto_calendar.js"></script>
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
		<script src="assets/js/jquery.sparkline.js"></script>
        
        <!-- EzMark -->
        <script src="assets/js/jquery.ezmark.js"></script>
        <script src="assets/select/select2.js"></script>
       
        <script type="text/javascript">
			$(function() {
				$('.custom-check input').ezMark()
			});	
		</script>
        
        <!-- Canvas.js-->
        <script src="assets/plugins/canvas/canvasjs.min.js"></script>
        <!-- ColorPicker -->
		<script type="text/javascript" src="colorPicker/colpick/js/colpick.js"></script>
        <script type="text/javascript" src="colorPicker/colpick/js/colpick-implem.js"></script>
        
        <!-- Custom -->
        <script src="assets/js/sidebar-navbar.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/chart-data.js"></script>
                
        <!-- Google Maps -->
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="assets/js/gmap3.js"></script>  
        <script src="assets/js/gmap.custom-index-map.js"></script>
        
        <!-- Font Awesome Markers -->
		<script src="assets/plugins/fontawesome-markers-master/fontawesome-markers.js"></script>
        
        <!-- Easy Pie Charts -->
		<script type="text/javascript" src="assets/plugins/jquery-easy-pie-chart/examples/excanvas.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
	   
        <!-- Initialize Carousel-->
		<script>$('.carousel').carousel({
			  interval: 7000
			})
		 </script>
        <!-- Flot -->
        <script type="text/javascript" src="assets/plugins/flot/jquery.flot.js"></script>
        <script type="text/javascript" src="assets/plugins/flot/jquery.flot.resize.js"></script>

    </body>
</html>








