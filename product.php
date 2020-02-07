<?php include 'includes.php'; ?>
<html lang="en">
            <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home : Divine Engineering In Chhattisgarh</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="animate.css" />
        <link rel="stylesheet" href="owl.carousel.min.css">
        <link rel="stylesheet" href="owl.theme.default.min.css">
        <link rel="stylesheet" href="slider.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->      </head>
  <body>
  
  <?php
	  include 'header.php';
	  echo '<div style="padding:10px;background-color:#ddd"></div>';
    $ds = "SELECT `id`,`category` FROM `category`";
    $result_ds = mysql_query($ds) or die(mysql_error());
    $i=0;
    $num = mysql_num_rows($result_ds);
    $nibmu = intval($num/2);
    while($row_ds = mysql_fetch_array($result_ds))
    {
    	
        echo '<a href="category.php?category_title='.base64_encode($row_ds['category']).'&category_id='.base64_encode($row_ds['id']).'" class="genda" style="text-transform:uppercase;text-align:center;padding:20px;font-weight:bold;">'.$row_ds['category'].'</a><div style="clear:both"></div>';
                                                   
        $i++;
    }
   ?>      
  
   
  </body>
</html>