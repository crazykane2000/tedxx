<html lang="en">
    <?php include 'includes.php'; ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Testimonials : CTG Security Solutions-Ethical Hacking | Web Security Expert | Network Security Expert |Bug Bounty |Source Code Review |Reverse Engineering | Exploit Development | Malware Analysis |Mobile Application Security |CISSP | Web Application Security | Network Vulnerability Assessment |Network Security | PCI DSS | Application Security Quality Assurance | Software Testing |Digital Forensics & Incident Response</title>

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
  <body style="background-color:#fff">
    
    <?php include 'header.php'; ?>   
    
  <div style="background-image:url('img/slide_strip.jpg');padding:10px">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h1 class="headsl" style="color:#fff;font-size:30px;">Testimonials </h1>
                <p style="color:#fff">See What we are upto in industry
                </p>
            </div>
        </div>
    </div>
  </div>
    <div style="padding:30px;"></div>
    
      <div class="container">
        
           <div class="container">
        <div class="row">
            <h1 class="heading1">
                Trending Testimonials
            </h1>    
            <div style="border-bottom:solid 1px #ccc;"></div>
        </div>
          <br/>
          <div class="row">
           <?php 
                $sql = "SELECT * FROM testimonials ORDER BY date DESC";
                $result = mysql_query($sql) or die(mysql_error());
                $i=0;
                while($row=mysql_fetch_array($result))
                {
                    if($i%4==0)
                    {
                        echo '</div><div class="row">';
                    }
                    echo '<div class="col-sm-3">
                              <div style="margin:10px;padding:10px;">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="img/200x200.png" style="width:50px;border-radius:50%">   
                                        </div>
                                        <div class="col-sm-9">
                                            <div style="padding:5px;padding-left:5px;">
                                                <b style="text-transform:capitalize">'.$row['name'].'</b>
                                                <p style="color:#888;font-size:11px;">Happy Client</p>
                                            </div>                        
                                        </div>
                                    </div> 
                                    <div style="padding:5px;border-bottom:solid 1px #ccc"></div>
                                    <div style="color:#000;font-family:arial;padding-top:10px;">'.$row['testimonial'].'</div>  
                            </div>  
                        </div>';
                    $i++;
                    
                }
              ?>
          </div>
      </div>
      </div>
      
    <div style="padding:20px;"></div>
    <?php include 'blue_strip.php'; ?>  
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