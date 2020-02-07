<html lang="en">
    <?php include 'includes.php';    
          $sql = "SELECT * FROM page1 WHERE id=".clean($_REQUEST['id']);
          $result = mysql_query($sql) or die(mysql_error());
            $data = mysql_fetch_assoc($result);
    ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $data['title']; ?> : CTG Security Solutions-Ethical Hacking | Web Security Expert | Network Security Expert |Bug Bounty |Source Code Review |Reverse Engineering | Exploit Development | Malware Analysis |Mobile Application Security |CISSP | Web Application Security | Network Vulnerability Assessment |Network Security | PCI DSS | Application Security Quality Assurance | Software Testing |Digital Forensics & Incident Response</title>

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
            <div class="col-sm-6    ">
                <h1 class="headsl" style="color:#fff;font-size:30px;"><?php echo $data['menu_name']; ?> </h1>
                <p style="color:#fff"><?php echo $data['title']; ?> 
                </p>
            </div>
        </div>
    </div>
  </div>
      
  <div class="container">
        <br>
      <div class="text-center">
         Our Customers always inspire us to do best work and thus we enjoy the postion we have in Security  Industry <a href="contact.php">Contact For More Information regarding work </a>
      </div>
  </div>
      
      
      <div style="padding:30px;"></div>
      <div class="container">
            <div class="row">
          
            <div class="col-sm-6">
               <div style="padding:10px;">
                  <h1 class="headsl     " style="font-size:30px;color:#222">
                   <?php echo $data['title']; ?>  </h1><br>
                   <div style="margin:5px 0px;border-bottom:solid 1px #ccc"></div>
                   <br>
                <?php  echo htmlspecialchars_decode($data['description']); ?>
                   <br/>
                   <br><br>

                    <a href="contact.php" class="btn btn-danger btn-lg" role="button" style="padding:10px 30px;border-radius:3px;background-color:#d53700 ">QUICK ENQUIRY</a>    
               </div>               
            </div>
               
                 <div class="col-sm-6">
                <div style="padding:20px;">
                   <img src="page/opt/<?php echo $data['image']; ?>" alt="Banner Printing" style="width:100%">
                </div>
            </div>  
            
        </div>
    </div>
      <div style="padding:20px;"></div>
      
      <div style="background-color:#bd2022">
           <div style="padding:40px;"></div>
        <div class="container">
            <div class="row">
          
            <div class="col-sm-10">
               <div style="padding:0px 15px;">
                  <h1 class="headsl2" style="color:#fff;font-family:'Roboto Slab'">
                    <?php echo $data['title2']; ?>             </h1><br>
                   <div style="margin:5px 0px;border-bottom:solid 1px #ccc"></div>
                   <br>
                    <div style="color:#fff"> <?php  echo htmlspecialchars_decode($data['description']); ?>
                        <br/><br/>

<p>Contact us today to learn about our repeat banner design plans and find out how we can help you to convince and retain your customers with professionally designed banners.</p>
</div>
                  <br><br>
                   
                  
                    <a href="contact.php" class="btn btn-danger btn-lg" role="button" style="padding:10px 30px;border-radius:3px;background-color:#d53700 ">QUICK ENQUIRY</a>
               </div>                   
            </div>
            
        </div>
          </div>
           <div style="padding:40px;"></div>
      </div>
      
   
    <?php include 'kala_patta.php'; ?>
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