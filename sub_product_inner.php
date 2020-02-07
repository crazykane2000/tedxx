<html lang="en">
    <?php include 'includes.php'; ?>
    <?php 
        $gty = "SELECT * FROM product WHERE sub_category='".clean(base64_decode($_REQUEST['category_title']))."'";
        $result_gty = mysql_query($gty) or die(mysql_error());
        $row_gty = mysql_fetch_assoc($result_gty);
        //print_r($row_gty);
     ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Product Categorys : <?php include 'title.php'; ?></title>
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
    
  <div style="background-image:url('img/slide_strip_Divine.jpg');padding:10px">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h1 class="headsl" style="color:#fff;font-size:30px;"><?php echo $row_gty['category']; ?>  </h1>
                <p style="color:#fff">Divine Engineering&trade; is an ISO 9001:2008 Certified &amp; Govt. Regd. Technology Company.
                </p>
            </div>
        </div>
    </div>
  </div>
      <div style="padding:20px;"></div>
        <div class="container">
         <strong style="font-size:20px;">Divine serves leading businesses, governments, non governmental organizations, and not-for-profits. We help our clients make lasting improvements to their performance and realize their most important goals. Over nearly a century, we’ve built a firm uniquely equipped to this task.</strong>
        <br><span>We can assemble the right team with the right experience to help clients anywhere in the world.</span>    
        <hr>
      </div>
      
      <div style="padding:20px;"></div>
      
      
      <div class="container">
        <div class="row">
          <?php 
          $gty = "SELECT * FROM product WHERE sub_category='".clean(($_REQUEST['id']))."'";
          //echo $gty;
          $i=0;
          $result_gty = mysql_query($gty) or die(mysql_error());
          while($row_cf = mysql_fetch_array($result_gty)){
          if($i%4==0){
          	echo '<div class="clearfix" style="padding:20px"></div>';
          }
            echo '<div class="col-sm-3">
                    <div style="padding: 10px;background-color: #fff;">
                      <div><a href="product_inner.php?id='.$row_cf['id'].'"><img class="filter" src="page/thumb/'.$row_cf['file'].'" style="width:100%"></a></div>
                      <br/>
                      <div style="font-size:20px;line-height:24px;color:#006df0">'.$row_cf['product_name'].'</div>
                      <p style="font-size: 12px;color:#888">'.$row_cf['menu_name'].'</p>
                    </div>
                  </div>';
                $i++;
          }
       ?>
        </div>
       </div>
        

      
      <div style="padding:40px;"></div>
      
        <div style="background-color: #fff;">
         <div style="padding:40px;"></div>
          <div class="container">
        <div class="row">
            <div class="col-sm-3 text-left">
               <div style="padding:10px">
                    <img src="img/safety-box.svg" style="width:70px">
                  <div style="padding:10px;"></div>
                 <strong style="font-size:17px;line-height:20px;color:#666">SAFETY</strong>
                   <div style="padding:15px"></div>
                <p>Safety is the most important of our core values. It is our first priority during every work day.</p>
                </div>
            </div>
           <div class="col-sm-3 text-left">
               <div style="padding:15px">
                    <img src="img/contact.svg" style="width:70px">
                  <div style="padding:10px;"></div>
                 <strong style="font-size:17px;line-height:20px;color:#666">COMMUNITY</strong>
                                      <div style="padding:10px"></div>
                <p>Involvement in and support of the community are at the heart of our company.</p>
                </div>
            </div>
            <div class="col-sm-3 text-left">
               <div style="padding:15px">
                    <img src="img/sustainable.svg" style="width:70px">
                  <div style="padding:10px;"></div>
                 <strong style="font-size:17px;line-height:20px;color:#666">SUSTANABILITY</strong>
                                      <div style="padding:10px"></div>
                <p>Structure’s commitment to green building and sustainability is long-standing.</p>
                </div>
            </div>
            
             <div class="col-sm-3 text-left">
               <div style="padding:15px">
                    <img src="img/book.svg" style="width:70px">
                  <div style="padding:10px;"></div>
                 <strong style="font-size:17px;line-height:20px;color:#666">KNOWLEDGE</strong>
                                      <div style="padding:10px"></div>
                <p>Structure’s commitment to green building and sustainability is long-standing.</p>
                </div>
            </div>
        </div>
      </div>
       <div style="padding:40px;"></div>
        </div>
     
      
    <?php include 'donation.php'; ?>
      <div style="padding:20px;"></div>
    <?php include 'client_panel.php'; ?> 
      <div style="padding:20px;"></div>
    <?php include 'footer_strip.php'; ?>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
  </body>
</html>