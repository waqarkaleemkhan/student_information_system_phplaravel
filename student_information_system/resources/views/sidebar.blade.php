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


                <div class="sidebar-back"></div>
                <div id="sidebar-wrapper" class="stretch-full-height">
                    <ul class="sidebar-nav">
                        <li id="dashboard">
                            <a href="index.html" class="active-title">
                                <span class="nav-icon"><i class="icon-dashboard icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Dashboard</span></a>            
                        </li>
                        <li id="email">
                            <a href="email.html">
                                <span class="nav-icon"><i class="icon-envelope-alt icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Email</span> <span class="responsive-hide badge">103</span>
                            </a>
                        </li>
                        <li class="nav-header" id="layout"> 
                            <a href="#" >
                                <span class="nav-icon"><i class="icon-folder-open icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Layouts</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="layouts">
                                <li><a href="boxedlayout.html">Boxed Layout</a></li>
                                <li><a href="horizontal-nav.html">Horizontal Menu</a></li>
                            </ul>
                        </li>
                        <li class="nav-header" id="uiMenu"> 
                            <a href="#">
                                <span class="nav-icon"><i class="icon-tablet icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">UI Set</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="uiMenus">
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="modals.html">Modals</a></li>
                                <li><a href="panels.html">Panels</a></li>
                                <li><a href="tabs.html">Tabs & Accordians</a></li>
                                <li><a href="sliders.html">Sliders</a></li>
                                <li><a href="notifications.html">Notifications</a></li>
                            </ul>
                        </li>
                        <li class="nav-header" id="page"> 
                            <a href="#">
                                <span class="nav-icon"><i class="icon-copy icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Pages</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="pages">
                                <li><a href="user-profile.html">User Profile</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="404.html">404 Page</a></li><li><a href="500.html">500 Page</a></li>
                                <li><a href="lock.html">Lock Screen</a></li>
                                <li><a href="message.html">Send Message</a></li>
                                <li><a href="fileupload.html">File Upload</a></li>
                                <li><a href="file-manager.html">File Manager</a></li>
								<li><a href="timeline.html">Timeline</a></li>
                            </ul>
                        </li>
                        <li class="nav-header" id="table"> 
                            <a href="#">
                                <span class="nav-icon"><i class="icon-table icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Tables</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="tables">
                                <li><a href="basic.html">Basic</a></li>
                                <li><a href="data.html">Data</a></li>
                            </ul>
                        </li>
                        <li id="charts">
                            <a href="charts.html">
                                <span class="nav-icon"><i class="icon-bar-chart icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Charts</span></a>            
                        </li>
                        <li id="map">
                            <a href="maps.html">
                                <span class="nav-icon"><i class="icon-map-marker icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Map</span></a>            
                        </li>
                        <li id="calender">
                            <a href="calendar.html">
                                <span class="nav-icon"><i class="icon-calendar icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Calendar</span></a>            
                        </li>
                        <li id="manager">
                            <a href="project-manager.html">
                                <span class="nav-icon"><i class="icon-edit icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Project Manager</span></a>            
                        </li>
                    </ul>
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