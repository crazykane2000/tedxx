<html lang="en">
    <?php include 'includes.php'; ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contact : CTG Security Solutions-Ethical Hacking | Web Security Expert | Network Security Expert |Bug Bounty |Source Code Review |Reverse Engineering | Exploit Development | Malware Analysis |Mobile Application Security |CISSP | Web Application Security | Network Vulnerability Assessment |Network Security | PCI DSS | Application Security Quality Assurance | Software Testing |Digital Forensics & Incident Response</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"/>
      <link rel="stylesheet" href="animate.css" />
      

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
      <link rel="stylesheet" href="owl.carousel.min.css">
        <link rel="stylesheet" href="owl.theme.default.min.css">
  </head>
  <body style="background-color:#eee">
    
    <?php include 'header.php'; ?>   
    
  <div style="background-image:url('img/slide_strip.jpg');padding:10px">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h1 class="headsl" style="color:#fff;font-size:30px;">Lets Talk  </h1>
                <p style="color:#fff">Contact Us for any information about any of our Services
                </p>
            </div>
        </div>
    </div>
  </div>
      <div style="padding:20px;"></div>
      
      <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div style="padding:10px;">
                    <h2 class="headsl2" style="font-size:20px;font-weight:bold">CONTACT US</h2>
                    <div style="margin:5px 0px;border-bottom:solid 1px #ccc"></div>
                    <br>
                    
                  <div class="contact-detail">
                                <ul style="list-style:none" class="bolder">
                                    <li>
                                        <strong class="bold">General Inquiries:</strong>
                                        <span class="bl"><a style="color:#d53700" href="tel:+91-8054251816">+91-805.425.1816 </a></span>
                                    </li>
                                    <li>
                                        <strong v="">Sales Inquiries:</strong>
                                        <span class="bl"><a style="color:#d53700" href="tel:+919810230650">+91-842.7371.816</a></span>
                                    </li>
                                    <li>
                                        <strong class="bold"> Technical Support:</strong>
                                        <span class="bl"><a style="color:#d53700" href="tel:+91-+91-8427.371.816">+91-8427.371.816</a></span>
                                        
                                    </li>
                                    <li>
                                        <strong class="bold"> Support Mail  :</strong>
                                        <span class="bl"><a style="color:#d53700" href="mailto:ajayanandctg@gmail.com">info@ctgsecuritysolutions.com </a></span>
                                    </li>
                                    <li class="meetus">
                                        <strong class="bold">Meet Us:</strong>
                                        <span>B - Block, Ranjit Avenue, Amritsar, Punjab</span>
                                        <span> India</span>
                                    </li>
                                </ul>
                               
                                <div class="content-box">
                                    <p>Need technical assistance? Speak with a support representative by calling <a href="tel:+91-805.425.1816" style="color:#d53700">+91-805.425.1816</a></p>
                                    <p>For employment details &amp; current openings, contact us at: <a href="mailto:ajayanandctg@gmail.com" style="color:#d53700">ajayanandctg@gmail.com</a></p>
                                    
                                    <p>For Physical Address Visit <a style="color:#d53700" href="https://www.google.co.in/maps/place/%E2%80%8B+CTG+Security+Solutions%E2%84%A2/@31.6343084,74.8056723,12z/data=!3m1!4b1!4m5!3m4!1s0x3919652aecb2d4a9:0x634f36f1200a41ea!8m2!3d31.6360547!4d74.8752737" target="_blank">Google Map</a></p>
                                </div>
                            </div>
                </div>
            </div>  
            
            <div class="col-sm-8" style="background-color:#fff;box-shadow:0px 0px 10px #ccc ">
               <div style="padding:20px;">
                   <br>
                    <?php 
                        if(isset($_REQUEST['choice']))
                        {
                            echo '<div style="background-color:#699500;color:#fff;padding:10px">'.$_REQUEST['value'].'</div>
                   <hr/>';
                        }
                   ?>
                   
                                        <strong style="font-size:20px;">Veficication Panel</strong>
                <br><span>Verify Employee or Student Who Claims to be part of CTG Security Solutions</span>    
                <hr>
                   
                       
                    <ul class="nav nav-tabs">
                       <li class="active"><a href="#a" data-toggle="tab">Student Verification</a></li>
                       <li><a href="#b" data-toggle="tab">Employee Verification</a></li>                      
                    </ul>

                    <div class="tab-content">
                       <div class="tab-pane active" id="a">
                            <div style="padding:10px">
                                <h3 style="color:#800;font-weight:bold">Student Verification</h3>
                                <p>Please Enter Students Enrollment Number to Search from Our Database</p>
                                <hr/>
                                 <div class="form-group">
                                    <label for="email"> Enrollment Number</label>
                                    <input type="text" class="form-control input-box" name="enroll_student" style="background-color:#eee" placeholder="Enter Enrollment Number" id="enroll_student">
                                  </div>

                                <div class="form-group">
                                    <input type="button" id="studentss" class="btn btn-success" value="Search Student" />
                                  </div>                            
                                <hr/>
                                <div id="stud"></div>
                            </div>
                        </div>
                       <div class="tab-pane" id="b">
                            <div style="padding:10px">
                                <h3 style="color:#800;font-weight:bold">Employee Verification</h3>
                                <p>Please Enter Employee Enrollment Number to Search from Our Database</p>
                                <hr/>
                                  <div class="form-group">
                                    <label for="email"> Employee Id</label>
                                    <input type="text" class="form-control input-box" name="employee_id" style="background-color:#eee" placeholder="Enter Enrollment Number" id="enroll_employee">
                                  </div>

                                  <div class="form-group">
                                    <input type="button" class="btn btn-success" id="employeess" value="Search Employee" />
                                  </div> <hr/>
                                
                                <div id="emp"></div>
                            </div>
                        </div>
                       
                    </div>
        
                
               </div>               
            </div>
        </div>
      </div>
      
    <?php include 'client_panel.php'; ?>
    <?php include 'counter.php'; ?>
    <?php include 'footer_strip.php'; ?>
    <?php include 'footer.php'; ?>
      
      
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jq.js"></script>
    <script type="text/javascript" src="hero.js" ></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script><script>new WOW().init();</script>
      <script>
        new WOW().init();
          
          
          $(document).ready(function(){
              $(".batakh").hover(function(){
                  $(this).children(".mol").addClass("rotation");
                  var image = $(this).children(".mol").attr("data-hover")
                  $(this).children(".mol").attr("src",image);
              },function(){
                  $(this).children(".mol").removeClass("rotation");
                  var image = $(this).children(".mol").attr("data-image")
                  $(this).children(".mol").attr("src",image);
              });
              
              $("#studentss").click(function(){
                  //alert(78797);
                  var student_id = $("#enroll_student").val();
                  $("#stud").load("student_load.php", {'student_id':student_id});
              });
              
              $("#employeess").click(function(){
                  //alert(78797);
                  var employee_id = $("#enroll_employee").val();
                  $("#emp").load("emp_load.php", {'employee_id':employee_id});
              });
              
          });
      </script>
      <script type="text/javascript" src="counter.js" ></script>
      <script type="text/javascript" src="wavepoint.js" ></script>
       <script type="text/javascript" src="owl.carousel.js" ></script>
       <script>  
            $(document).ready(function( $ ) {
                $('.counter').counterUp({
                    delay: 50,
                    time: 3000
                });
            });
    </script>
      <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
                responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:false
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:6,
                    nav:false,
                    loop:true
                }
            }
        });
      </script>

  </body>
</html>