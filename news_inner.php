<html lang="en">
    <?php include 'includes.php'; ?>
    <?php
        $ds = "SELECT * FROM news WHERE id=".clean($_REQUEST['id']);
        $result_ds = mysql_query($ds) or die(mysql_error());
        $row_ds = mysql_fetch_assoc($result_ds);
        $raga = $row_ds;
    ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $row_ds['title']; ?> : CTG Security Solutions-Ethical Hacking | Web Security Expert | Network Security Expert |Bug Bounty |Source Code Review |Reverse Engineering | Exploit Development | Malware Analysis |Mobile Application Security |CISSP | Web Application Security | Network Vulnerability Assessment |Network Security | PCI DSS | Application Security Quality Assurance | Software Testing |Digital Forensics & Incident Response</title>

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
                <h1 class="headsl" style="color:#fff;font-size:30px;"><?php echo $raga['title']; ?> </h1>
                
            </div>
        </div>
    </div>
  </div>
      <div style="padding:10px;background-color:green;color:#fff;">
        <div class="container">
            <?php
                if(isset($_REQUEST['choice']))
                {
                    echo $_REQUEST['value'];
                }
            ?>
          </div>
      </div>
    <div style="padding:40px;"></div>
     
   <div class="container">
        <div class="row">
           
            
            <div class="col-sm-4 row-eq-height" style="background-color:#bd2022;box-shadow:0px 0px 10px #ccc;color:#fff">
               <div style="padding:20px;">
                   <br>
                   
                     <strong style="font-size:20px;">Services We Provide</strong>    
                <hr>
                <?php 
                    $dx = "SELECT `title`,`id` FROM page1 WHERE `category`='Services' ORDER BY date DESC";
                    $result_dx = mysql_query($dx) or die(mysql_error());
                    while($row_dx = mysql_fetch_array($result_dx))
                    {
                        echo '<a href="page_inner.php?id='.$row_dx['id'].'"><div style="padding:6px;border-bottom:solid 1px #ff6a6b;color:#fff">'.$row_dx['title'].'</div></a>';
                    }
                   ?>
                   <br/>
                  <strong style="font-size:20px;">Training We Provide</strong>    
                <hr>
                   <?php 
                    $dx = "SELECT `title`,`id` FROM page1 WHERE `category`='Training' ORDER BY date DESC";
                    $result_dx = mysql_query($dx) or die(mysql_error());
                    while($row_dx = mysql_fetch_array($result_dx))
                    {
                        echo '<a href="page_inner.php?id='.$row_dx['id'].'"><div style="padding:6px;border-bottom:solid 1px #ff6a6b;color:#fff">'.$row_dx['title'].'</div></a>';
                    }
                   ?>
                   <br/>
               </div>               
            </div>
            
            <div class="col-sm-8 row-eq-height" style="background-color:#fff;box-shadow:0px 0px 10px #ccc ">
                <div style="padding:10px;">
                        
                    <h2 class="headsl2" style="font-size:20px;font-weight:bold"><?php echo $raga['title']; ?> </h2>
                     <div class="sep"></div>
                        <div style="opacity:.6"><i class="fa fa-map-clock" aria-hidden="true"></i> <?php echo $raga['date']; ?> </div>
                    <br>
                    <img src="news/opt/<?php echo $raga['file']; ?>" style="width:100%" />
                    
                  <div class="contact-detail">
                    <div class="content-box">
                       <?php echo htmlspecialchars_decode($raga['description']); ?> 
                    </div>
                  </div>
                    <hr>
                   <?php
                        echo '<div style="float:left;padding:5px;background-color:red;color:#fff;margin:3px;">Date : '.$raga['date'].'</div>';
                    ?>
                    <div class="clear"></div>
                    <br>
                </div>
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