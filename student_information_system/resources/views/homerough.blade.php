<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>IIUI-Student Information System</title>
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
                <h6 style="font-size:15px">Student Information System</h6>
                <strong>IIUI</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="#"style="font-size:14px; pointer-events: none;">
                        <i class="fas fa-user"></i>
                        Student Profile
                        
                    </a>
                    
                </li>
                <li>
                    <a class="isDisabled" style="font-size:14px; pointer-events: none;">
                        <i class="fas fa-briefcase"></i>
                        Student Confirmation
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
			
            <!--code here-->
            

                            
            <div class="container">
				<div class="row">

                    <label class="col-md-12 control-label"><h5><span><i class="fas fa-user"></i> Student Profile<span></h5></label>
                    
                

					<div class="col-md-9">
						<form class="form" action="{{ URL('confirmation') }}" method="post" >
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="name">Full Name</label>
								<input type="text" class="form-control" name ="name" id="name" placeholder="e.g. Muhammad Ali" required>
							</div>
							<div class="form-group col-md-6">
								<label for="fathername">Father Name</label>
								<input type="text" class="form-control" name="fathername" id="fathername" placeholder="e.g. Ali Khan" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="email">Email</label>
								<input type="email" class="form-control" name ="email" id="email" placeholder="a@gmail.com" required>
							</div>
							<div class="form-group col-md-6">
								<label for="mobile">Mobile No</label>
								<input type="tel" class="form-control" name="mobile" id="mobile" placeholder="+921234567890" required>
							</div>
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="gender">Gender</label>
								<select class="form-control" name="gender" id="gender" required>
										<option value="" selected="">--Select Gender--</option>
										<option value="male" >Male</option>
										<option value="male" >Female</option>
								</select>
							</div>
							
							<div class="form-group col-md-6">
								<label for="faculty">Faculty</label>
								<select class="form-control" name="faculty" id="facultySel" onchange="ChangeFaculty()" required>
                                        <option value="" selected="selected">-Select Faculty-</option>
                                        <!--<option value="">-Select Faculty-</option>
										<option value="Arabic" >Arabic</option>
										<option value="FBAS" >Basic and Applied Sciences</option>
										<option value="FET" >Engineering and Technology</option>
                                        <option value="Usuluddin" >Usuluddin (Islamic Studies)</option>
                                        <option value="Languages Literature" >Languages Literature</option>
                                        <option value="FMS" >Management Sciences</option>
                                        <option value="Social Sciences" >Social Sciences</option>
                                        <option value="International Institute of Islamic Economics" >International Institute of Islamic Economics</option>
                                        <option value="Shariah and Law" >Shariah and Law</option>-->
                                </select>
							</div>
							
						</div>
						
						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="department">Department</label>
								<select class="form-control" name="department" id="departmentSel" onchange="ChangeDepartment()" required>
                                    <option value="" selected="selected">-Select Department-</option>
                                        <!--<option value="na" selected="">-Select Department-</option>
										<option value="dcs" >DCS</option>
										<option value="mathimatics" >Mathimatics</option>-->
								</select>
							</div>
							
							<div class="form-group col-md-6">
								<label for="program">Program</label>
								<select class="form-control" name="program" id="programSel" required>
                                        <option value="" selected="selected">-Select Program-</option>
								</select>
							</div>
							
						</div>
						
						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="batch">Batch</label>
								<select class="form-control" name="batch" id="batch" required>
										<option value="" selected="">--Select Batch--</option>
										<option value="F12" >F12</option>
										<option value="F13" >F13</option>
                                        <option value="F14" >F14</option>
                                        <option value="F15" >F15</option>
                                        <option value="F16" >F16</option>
                                        <option value="F17" >F17</option>
                                        <option value="F18" >F18</option>
								</select>
							</div>
							
							<div class="form-group col-md-6">
								<label for="semester">Semester</label>
								<select class="form-control" name="semester" id="semester" required>
										<option value="" selected="">--Select Semester--</option>
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
                        <br>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-row">
                            <div class="col-md-11"></div>
                            <div class="col-md-1">
                            <button type="submit" class="btn btn-success">
                                    Submit
                                </button>
                            </div>
                        </div>
						</form>
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