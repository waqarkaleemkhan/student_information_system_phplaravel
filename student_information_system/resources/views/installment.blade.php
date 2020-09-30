<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>IIUI-Student Information System</title>
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
		<link rel="stylesheet" href="/assets/weather-icons/weather-icons.css">
        <link href="/assets/select/select2.css" rel="stylesheet"/>
        <link rel="stylesheet" media="screen" type="text/css" href="/colorPicker/colpick/css/colpick.css" />

    </head>
    <body>

    <style>
        @media print {
            #printPageButton {
                display: none;
            }
}
    </style>
    
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/img/usersm.jpg" alt="Ryan" class="img-circle nav-avatar"><span class="username">{{ Auth::user()->name }}</span><b class="caret"></b></a>
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
                        <li id="dashboard">
                            <a href="{{ url('/home') }}" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-user icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Profile</span></a>            
                        </li>

                        <li class="nav-header" id="uiMenu"> 
                        <a href="#" style="color: #ffffff;">
                            <span class="nav-icon"><i class="icon-book icon-2x"></i></span>
                            <span class="sidebar-menu-item-text">Course Reg</span>
                            <i class="icon-chevron-down pull-right"></i>
                        </a>
                        <ul class="nav nav-list collapse submenu" id="uiMenus">
                            <li><a href="{{ url('/courses') }}" style="color: #ffffff;">Courses</a></li>
                        </ul>
                        </li>

                        <li class="nav-header" id="uiMenu"> 
                            <a href="#" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-euro icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Fees</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="uiMenus">
                                <li><a href="{{ url('/studfee') }}" style="color: #ffffff;">Fee Details</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ url('/rollnoslip') }}" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-file icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Roll# Slip</span></a>            
                        </li>

                        <li>
                            <a href="{{ url('/studresults') }}" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-check icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Results</span></a>            
                        </li>


                    </ul>
                </div>
                <!-- /sidebar -->
                <!-- Keep all page content within the page-content-wrapper -->
                <div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
                    
                            
                    <div class="container" id="printpage">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div>
                                <div class="panel-heading">
                                    
                                    <div class="text-center"><h4><u> Request for payment of tution fee in two equal installments<br> of continuing students for the {{ $temp_session }} semester</u></h4></div>
                                    <br>
                                    <div class="row text-center">
                                        
                                        <h4><b>Fee Section Verification</b></h4>
                                        
                                    </div>
                                    <br>
                                    <div class="text-center"><p>Certified that nothing is outstanding against student and he/she has paid all the previous fees/dues.</p></div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 "><b style="text-decoration-line: overline;">AAO Fee / Relevant Faculity Assistant</b></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <br>
                                </div>
                                <div class="panel-body">
                                
                                <div class="col-md-1"></div>
                                   <div class="col-md-6">
                                        <p style="font-size:18px;">Registration No: <u> {{Auth::user()->reg}} </u></p>
                                        <p style="font-size:18px;">Student Name: <u> {{Auth::user()->name}} </u></p>
                                        <p style="font-size:18px;">Father Name: <u> {{Auth::user()->father_name}} </u></p>
                                        <p style="font-size:18px;">1st Installment (Rs.):  <u> {{ $inst }} </u></p> 
                                   </div>

                                   <div class="col-md-5">
                                        
                                        <p style="font-size:18px;">Program: <u> {{Auth::user()->program}} </u></p>
                                        <p style="font-size:18px;">Total Fee due of semester (Rs):<u> {{ $data }}  </u></p>
                                        <p style="font-size:18px;">Last Date of Payment: <u> {{ $temp_feedue }} </u></p>
                                        <p style="font-size:18px;">2nd Installment (Rs.): <u> {{ $inst }} </u></p>
                                        
                                   </div>
                                    
                                    <div class="row">
                                    <br><br><br>
                                    <br><br><br>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-7">

                                             <p style="font-size:16px;">1. Due to genuine financial constraints i shall not be able to deposit full fee of this semester at a time by the due date.</p>         
                                             <p style="font-size:16px;">2. I confirm that i donot have previous outstandings amount to pay on account of university fees</p>
                                             <p style="font-size:16px;">3. I undertake to pay: <br> &nbsp;&nbsp; a. <b>1st Installment</b> by <b>{{ $temp_feedue }}</b><br> &nbsp;&nbsp; b. <b>2nd Installment</b> by <b>{{ $temp_instaldue }}</b></p>
                                             <p style="font-size:16px;">4. I also undertake that i shall not be allowed to appear in the Mid Term / Final Examination.</p>
                                             <p style="font-size:16px;">5. It is also certified that there is nothing outstanding on an account against me.</p>
                                             <p style="font-size:16px;"><b>6. Requested for consideration of two equal installment of Tution Fee.</b></p>
                                             <p style="font-size:16px;"><b>7. No furthur extension shall be requested.</b></p>
                                             <p style="font-size:16px;"><b>8. In Case of expiry of the due date we shall pay fine as per approved rates of Rs.100/- day which shall not be exempted of reduced.</b></p>
                                             <p style="font-size:16px;"><b>9. Permission will be allowed in hardship cases only.</b></p>
                                        </div>
                                        <div class="col-md-3"></div>
                                        
                                    </div>
                               <div class="row panel">
                               <br><br><br>
                               <br><br><br>
                            
                               
                               
                                    <div class="row">
                                    
                                         <div class="col-md-4 text-center">
                                             <p style="font-size:18px;"><h5 style="text-decoration-line: overline;"> Signature of Parents/Guardian<br><b>(Copy of CNIC)<b></h5></p>
                                         </div>
                                         <div class="col-md-2"></div>
                                         <div class="col-md-4 text-center">
                                         <p><h5 style="text-decoration-line: overline;" class="pull-right"> Signature of student<br><b>(Copy of CNIC)<b></h5></p>
                                         </div>
                                         
                                         
                                         
                                    <div>

                                </div>
                                <br>
                                <br>
                                <br>
                                <br>

                                <div class="row text-center">
                                    <h4>Allowed two equal installments of tution fee only.</h4>
                                </div>
                                <br>
                                   </div>
                                   <br>
                                   <br>
                            
                                </div>
                                </div>
                                </div>
                                <div class="row text-center">
                                    <p style="font-size:16px;" class="text text-success"><u>Note:</u>&nbsp;In case of installment (Print this form and goto your program office for verification).<br> and then goto fee section and take slip .</p>
                                    <p style="font-size:16px;" class="text text-danger">Pay your 1st installment before due date ( {{ $temp_feedue }} ) </p>
                                </div>
                                <br>
                                
                            </div><!--/panel-->
                        </div>
                        </div>
                    </div>
                    

                        <div class="container">
                            <div class="row text-center">
                                <a onclick="printDiv()" value="print" id="#printPageButton" class="btn btn-primary btn-small">Print</a>
                            </div>
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


        <script type="text/javascript">

function printDiv(){
    var css = '@page { size: 25cm 45.7cm; margin: 5mm 5mm 5mm 5mm;} ',
    
    head = document.head || document.getElementsById('printpage')[0],
    style = document.createElement('style');

    style.type = 'text/css';
    style.media = 'print';

    if (style.styleSheet){
    style.styleSheet.cssText = css;
    } else {
    style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);

    window.print();
}

     
</script>


      
        
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
