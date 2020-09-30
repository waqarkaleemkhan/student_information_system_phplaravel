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
                            <a href="#"  style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-user icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Profiles</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="uiMenus">
                                <li><a href="{{ url('admin/home') }}" style="color: #ffffff;" >Student Profiles</a></li>
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
                            <a href="#" style="color: #ffffff;">
                                <span class="nav-icon"><i class="icon-euro icon-2x"></i></span>
                                <span class="sidebar-menu-item-text">Fees Schema</span>
                                <i class="icon-chevron-down pull-right"></i>
                            </a>
                            <ul class="nav nav-list collapse submenu" id="uiMenus">
                                <li><a href="{{ url('admin/feedetails') }}" style="color: #ffffff;">Fees Detals</a></li>
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
                            <a href="#" style="color: #ffffff;"  class="active-title">
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
                
                    <div class="row">
                        <div class="col-md-5">
                        </div>
                        <div class="col-md-4">
                            <legend><span><i class="icon-file"></i> &nbsp;</span>Fee Reporter</legend>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        @if(isset($message))
                        <div class="alert alert-danger text-center">
                            {{ $message }}
                        </div>
                        @endif
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    <br>

                    
                    <form class="form-horizontal" method="POST" action="{{ url('admin/feereportered') }}">
                            {{csrf_field()}}
                            

                                <fieldset>
                                <div class="col-md-6">
                
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="faculity">Faculity:</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="faculity" id="facultySel" onchange="ChangeFaculty()" required>
                                                    <option value="" selected="selected">-select faculty-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="department">Department:</label>
                                        <div class="col-lg-9"> 
                                            <select class="form-control" name="department" id="departmentSel" onchange="ChangeDepartment()" required>
                                                <option value="" selected="selected">-select department-</option>
                                            </select>
                                        </div>
                                    </div>
                                    


                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="program">Program:</label>
                                        <div class="col-lg-9"> 
                                            <select class="form-control" name="program" id="programSel" required>
                                                <option value="" selected="selected">-select program-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sort" class="col-lg-3 control-label">Sort:</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="sort" id="sort">
                                                        <option value="ASC" selected="selected">Ascending</option>
                                                        <option value="DESC" >Descending</option>
                                                </select>
                                            </div>
                                    </div>
                                    <br>

                                    <br>
                                    <br>
                                    <br>

                                </div>

                                <div class="col-md-6">

                                    
                                <div class="form-group">
                                        <label for="gender" class="col-lg-3 control-label">Gender:</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="gender" id="gender" required>
                                                        <option value="" selected="selected">-select gender-</option>
                                                        <option value="Male" >Male</option>
                                                        <option value="Female" >Female</option>
                                                </select>
                                            </div>
                                    </div>
                                

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="batch">Batch</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="batch" id="batch" required>
                                                    <option value="" selected="selected">-select batch-</option>
                                                    <option value="F12" >F12</option>
                                                    <option value="F13" >F13</option>
                                                    <option value="F14" >F14</option>
                                                    <option value="F15" >F15</option>
                                                    <option value="F16" >F16</option>
                                                    <option value="F17" >F17</option>
                                                    <option value="F18" >F18</option>
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="semester">Semester</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="semester" id="semester" required>
                                                    <option value="" selected="selected">-select semester-</option>
                                                    <option value="1" >1</option>
                                                    <option value="2" >2</option>
                                                    <option value="3" >3</option>
                                                    <option value="4" >4</option>
                                                    <option value="5" >5</option>
                                                    <option value="6" >6</option>
                                                    <option value="7" >7</option>
                                                    <option value="8" >8</option>
                                                    <option value="9" >9</option>
                                                    <option value="10" >10</option>
                                                    <option value="11" >11</option>
                                                    <option value="12" >12</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="fee_status" class="col-lg-3 control-label">Fee Status:</label>
                                            <div class="col-lg-9">
                                            <select class="form-control" name="fee_status" required>
                                                    <option value="" selected="selected">-select status-</option>
                                                    <option value="clear" >Clear</option>
                                                    <option value="remain" >Remaining</option>
                                            </select>
                                            </div>
                                    </div>

                                    

                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-2">
                                    
                                    <div class="form-group">
                                        
                                            <button type="submit" class="btn btn-primary pull-right" name="btnsubmit">Generate</button>
                                            <a href="{{ url('admin/reports') }}" class="btn btn-primary pull-left">Back</a>
                                            
                                       
                                    </div>

                                </div>

                                    </div>
                                    <div class="col-md-5"></div>
                                </div>
                                </fieldset>
                                
                            </form>
                    

                </div>
                <br><br>

				
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

        <script>
            var uniObject = {
                "Arabic": {
                    "Department of Linguistics": [
                        "PhD Arabic Literature & Linguistics", 
                        "MS Arabic Literature & Linguistics",
                        "MA Arabic",
                        "BS Arabic"
                        ],
                    "Department of Translation & Interpretation": [
                        "MS Translation Studies",
                        "BS Translation & Interpretation"
                        ]
                },
                "Basic and Applied Sciences": {
                    "Department of Computer Science & Software Engineering": [
                        "PHD Computer Science",
                         "MS Software Engineering",
                         "BS Software Engineering",
                         "BS Information Technology",
                         "BS Computer Science"
                         ],
                    "Department of Mathematics and Statistics": [
                        "PhD Mathematics", 
                        "MSc Statistics",
                        "MSc Mathematics",
                        "MS Statistics",
                        "MS Mathematics",
                        "BS Statistics",
                        "BS Mathematics"
                        ],
                    "Department of Physics": [
                        "PhD Physics",
                         "MSc Physics",
                         "MS Physics",
                         "BS Physics"
                         ],
                    "Department of Environmental Sciences": [
                        "PHD Environmental Science",
                         "MS Environmental Sciences",
                         "BS Environmental Sciences"
                         ],
                    "Department of Bio Informatics & Bio Technology": [
                        "PhD Bio-Technology", 
                        "MS Bio-Technology",
                        "MS Bio-Informatics",
                        "BS Biology (4 Year)",
                        "BS Bioinformatics",
                        "BS Bio-Technology"
                        ],
                    "SA Centre for Interdisciplinary Research in Basic Sciences": [
                        "MS Environmental Sciences",
                         "MS Chemistry",
                         "MS Biosciences"
                         ]
                },
                "Engineering and Technology": {
                    "Department of Electrical Engineering": [
                    "PhD Electrical Engineering",
                     "MS Electrical Engineering",
                     "BS Electrical Engineering",
                     ],
                    "Department of Mechanical Engineering": [
                        "PhD Mechanical Engineering", 
                        "MS Mechanical Engineering",
                        "BS Mechanical Engineering"
                        ],
                    "Department of Civil Engineering": ["BS Civil Engineering"],
                    "Iqra College of Technology": [
                        "B-Tech Civil", 
                        "B-Tech (Mechnical)",
                        "B-Tech (Electrical)"
                        ]
                },
                "Usuluddin (Islamic Studies)": {
                    "Faculty of Usuluddin (Islamic Studies)": [
                        "PhD Usuluddin", 
                        "MS Usuluddin",
                        "BS Usuluddin"
                        ]
                },
                "Languages Literature": {
                    "Department of English": [
                        "MS English",
                         "MA English",
                         "BS English"
                         ],
                    "Department of Urdu": [
                        "Phd Urdu", 
                        "MA Urdu",
                        "BS Urdu"
                        ],
                    "Department of Persian": [
                        "MA Persian", 
                        "BS Persian"
                        ]
                },
                "Management Sciences": {
                    "Department of Management": [
                        "PhD Management Sciences ",
                         "MS Management Science (Fin, Mkt, Mang & TM) (1.5 Year)",
                         "MBA-EXECUTIVE (Evening Program)",
                         "MBA Fin., Mkt., Mgt., MIS (3.5 Yr)",
                         "MBA Fin., Mkt., Mgt., MIS (1.5 Years",
                         "BS Accounting & Finance",
                         "BBA"
                         
                         ],
                    "Department of Technology Management": [
                        "MBA-ITM (3.5 Years)", 
                        "MBA-ITM (1.5 Years)",
                        "BBA-ITM"
                        ]
                },
                "Social Sciences": {
                    "Department of Education": [
                        "PhD Education", 
                        "MS Education",
                        "MA Education",
                        "BS Education",
                        "B.Ed 1.5 years",
                        "B.Ed (Hons) (Elementary Education) 4 years",
                        "B.Ed (Elementary) 2.5 years"
                        ],
                    "Department of History and Pakistan Studies": [
                        "MS Pakistan Studies",
                         "MS History",
                         "MA Pakistan Studies",
                         "MA History",
                         "BS Pakistan Studies",
                         "BS History"
                         ],
                    "Department of Media and Communication Studies": [
                        "PhD Media and Communication",
                         "MSc Media & Communication",
                         "MS Media & Communication",
                         "BS Media & Communication"
                         ],
                    "Department of Politics and International Relations": [
                        "PhD Political Science",
                         "PhD International Relations",
                         "MS Political Science",
                         "MS International Relations",
                         "MA Political Science",
                         "MA International Relations",
                         "BS Political Science",
                         "BS International Relations"
                         ],
                    "Department of Psychology": [
                        "PHD Psychology", 
                        "MSc Psychology",
                        "MS Psychology",
                        "International Diploma on Mental Health, Law & Human Rights",
                        "BS Psychology"
                        ],
                    "Department of Sociology": [
                        "PhD Sociology",
                         "MS Sociology",
                         "BS Sociology"
                         ],
                    "Department of Islamic Arts and Architecture": [
                        "BS (IA&A)"
                         ],
                    "Department of Anthropology": [
                        "MSc Anthropology", 
                        "BS Anthropology"
                        ]
                },
                "International Institute of Islamic Economics": {
                    "School of Economics": [
                        "PhD Economics", 
                        "MS Economics",
                        "BS Economics"
                        ],
                    "School of Islamic Banking & Finance": [
                        "PhD Islamic Banking & Finance",
                         "PGD IBF",
                         "MS Islamic Banking & Finance",
                         "BS Islamic Banking and Finance"
                         ],
                    "Department of Economics & Finance": [
                        "BS Economics & Finance"
                        
                        ]
                },
                "Shariah and Law": {
                    "Department of Shariah": [
                        "MS Shariah (Muslim Family Law)", 
                        "MS Shariah (Islamic Law & Jurisprudence) (2 Year)",
                        "LLM Shariah (Muslim Family Law)",
                        "LLM Shariah (Islamic Law & Jurisprudence) (2 Year)",
                        "BA/LLB (Hons) Shariah & Law"
                        ],
                    "Department of Law": [
                        "LLB (Evening)"
                        ]
                },
            }
            window.onload = function () {
                var facultySel = document.getElementById("facultySel"),
                    departmentSel = document.getElementById("departmentSel"),
                    programSel = document.getElementById("programSel");
                for (var faculty in uniObject) {
                    facultySel.options[facultySel.options.length] = new Option(faculty, faculty);
                }
                facultySel.onchange = function () {
                    departmentSel.length = 1; // remove all options bar first
                    programSel.length = 1; // remove all options bar first
                    if (this.selectedIndex < 1) return; // done   
                    for (var department in uniObject[this.value]) {
                        departmentSel.options[departmentSel.options.length] = new Option(department, department);
                    }
                }
                facultySel.onchange(); // reset in case page is reloaded
                departmentSel.onchange = function () {
                    programSel.length = 1; // remove all options bar first
                    if (this.selectedIndex < 1) return; // done   
                    var program = uniObject[facultySel.value][this.value];
                    for (var i = 0; i < program.length; i++) {
                        programSel.options[programSel.options.length] = new Option(program[i], program[i]);
                    }
                }
            }


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
