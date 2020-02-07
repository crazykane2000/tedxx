<html lang="en">
    <?php include 'includes.php'; ?>
    <?php
        $ds = "SELECT * FROM career WHERE id=".clean($_REQUEST['id']);
        $result_ds = mysql_query($ds) or die(mysql_error());
        $row_ds = mysql_fetch_assoc($result_ds);
        $raga = $row_ds;
    ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $row_ds['title_post']; ?> : CTG Security Solutions-Ethical Hacking | Web Security Expert | Network Security Expert |Bug Bounty |Source Code Review |Reverse Engineering | Exploit Development | Malware Analysis |Mobile Application Security |CISSP | Web Application Security | Network Vulnerability Assessment |Network Security | PCI DSS | Application Security Quality Assurance | Software Testing |Digital Forensics & Incident Response</title>

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
                <h1 class="headsl" style="color:#fff;font-size:30px;"><?php echo $raga['title_post']; ?> </h1>
                <p style="color:#fff">The job description for the following post is below..
                </p>
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
                   
                     <strong style="font-size:20px;">If you are interested in this Job, just senf your information</strong>
                <br><span>Our HR Executive will be calling you shortly for Interview.</span>    
                <hr>
                
                <form method="POST" enctype="multipart/form-data" action="career_handle.php">
                      <div class="form-group">
                        <label for="email">Your Name</label>
                        <input type="text" class="form-control input-box" style="background-color:#fff" name="name" placeholder="Enter Your Name Here" id="name">
                      </div>
                    
                      <div class="form-group">
                        <label for="pwd">Your Email</label>
                         <input type="email" class="form-control input-box" style="background-color:#fff" name="email" placeholder="Enter Your Email Here" id="email">
                      </div>
                    
                    <div class="form-group">
                        <label for="pwd">Your WhatsApp / Contact Number</label>
                         <input type="text" class="form-control input-box" style="background-color:#fff" name="contact" placeholder="Enter Your Contact No. Here" id="contact">
                      </div>
                    
                    <div class="form-group">
                        <label>Your Query</label>
                        <textarea placeholder="Enter Your Query Here" style="background-color:#fff" name="query" class="form-control input-box" id="query"></textarea>
                      </div>
                    
                    <input type="hidden" name="post" value="Administrative Support">
                      <input type="hidden" name="id" value="4">
                    
                    <div class="clearfix"></div>
                     <br/>
                      <button type="submit" class="btn" style="color:#444">Send Query Now!</button>
                </form> 
               </div>               
            </div>
            
            <div class="col-sm-8 row-eq-height" style="background-color:#fff;box-shadow:0px 0px 10px #ccc ">
                <div style="padding:10px;">
                        
                    <h2 class="headsl2" style="font-size:20px;font-weight:bold"><?php echo $raga['title_post']; ?> </h2>
                     <div class="sep"></div>
                        <div style="opacity:.6"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $raga['location']; ?> </div>
                    <br>
                    
                  <div class="contact-detail">
                    <div class="content-box">
                       <?php echo htmlspecialchars_decode($raga['description']); ?> 
                    </div>
                  </div>
                    <hr>
                   <?php
                        $datas = explode( ",", $raga['tags']);
                        //print_r($datas);
                        foreach($datas as $datac)
                        {
                            echo '<div style="float:left;padding:5px;background-color:red;color:#fff;margin:3px;">'.$datac.'</div>';
                        }
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