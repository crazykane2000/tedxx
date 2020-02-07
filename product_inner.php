<html lang="en">
    <?php include 'includes.php'; 
        $sqlo = "SELECT * FROM product WHERE id=".clean($_REQUEST['id']);
        $resulto = mysql_query($sqlo) or die(mysql_error());
        $rata = mysql_fetch_assoc($resulto);
    ?>
  <head>
    <title><?php echo $rata['product_name']; ?>: <?php include 'title.php'; ?></title>
    <?php include 'head.php'; ?>
  </head>
  <body style="background-color:#fff">
    
    <?php include 'header.php'; ?>   
    
  <div style="background-image:url('img/slide_strip_Divine.jpg');padding:10px">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h1 class="headsl" style="color:#fff;font-size:30px;"><?php echo $rata['menu_name']; ?>  </h1>
                <p style="color:#fff"><?php echo $rata['product_name']; ?>
                </p>
            </div>
        </div>
    </div>
  </div>
    <div style="padding:40px;"></div>
    
      <div class="container">
        <div class="col-sm-6">
            <img src="page/opt/<?php echo $rata['file']; ?>" style="width:100%" />
        </div>
          <div class="col-sm-6">
            <div style="padding:10px;text-align:left;">
                 <div style="padding:7px;background-color:#5aab11;color:#fff;float:left">Status : <?php echo $rata['status']; ?></div> <div class="hyuim"></div>  <div style="padding:7px;background-color:#999;color:#fff;float:left">Brand : <?php echo $rata['brand']; ?></div><div class="hyuim"></div>
                <br class="clear"><br>
                
            <div class="gray_heading" style="font-size:24px;margin:0px; ">
                <h2 style="font-family:'Roboto Slab';color:#0776c6;margin-top:0px;"><?php echo $rata['product_name']; ?></h2>
                <div class="green_line" style="font-size:14px;font-family:arial;">
                <?php echo $rata['small_discription']; ?>          </div>                
            </div>
               <br>
            <div style="font-family:arial;font-size:13px;">
              
                <div style="padding-left:10px;font-family:arial;font-size:14px;line-height:18px"> 
                    <?php echo $rata['description']; ?>       
                </div>
                    <div class="section group" style="width:100%">
                       <hr/>                        
                        <div class="col span_1_of_3">
                            <div style="padding:12px;margin-top:3px;">
                                 <a href="contact.php?product=90" class="btn btn-primary btn-lg">Enquire Now</a>
                            </div>
                        </div>
                    </div>
                    
              
           </div>	
						<hr/>
						<span style="font-size:11px;font-family:arial;color:#666">The Pictures Shown Above are Rendered to Attract Visitors, The Actual Product May Slightly Vary, Please Feel Free to Discuss Us Before taking any action and also Read the <a href="terms_and_conditions.php">Terms And Condiions Section</a></span>  
           </div>
          </div>
      </div>
      
    <div style="padding:20px;"></div>
      
      <div class="container">
        <div class="row">
            <div style="padding:10px;">
                <h2 style="color:#0776c6;font-family:'Righteous';font-weight:normal">Our Featured Products</h2>
                <div style="padding:3px;border-bottom:solid 1px #ccc;"></div>
                <br class="clearfix">
                <br/>
                <?php 
                    $ds = "SELECT product_name,file,small_discription,id FROM product WHERE category='".$rata['category']."'";
                    $result_ds = mysql_query($ds) or die(mysql_error());
                    $i=0;
                    while($row_ds = mysql_fetch_array($result_ds))
                    {
                        if($i%4==0)
                        {
                            echo '<div class="clearfix" style="padding:10px;"></div>';
                        }
                        echo ' <div class="col-md-3">            
                                    <div class="thumbnail" style="padding:10px;">
                                        <a href="product_inner.php?id='.$row_ds['id'].'"  rel="tooltip" title="'.$row_ds['product_name'].'" data-original-title="'.$row_ds['product_name'].'">
                                        <img src="page/thumb/'.$row_ds['file'].'" alt="'.$row_ds['product_name'].'" class="filter" title="View Product"></a>
                                        <h4 style="font-family:roboto Slab;font-size:16px;color:#1b78c7">'.$row_ds['product_name'].'</h4>
                                        <p style="opacity:.6;font-size:12px;">'.substr(strip_tags($rata['description']), 0, 70).'</p>
                                    </div>
                              </div>';
                        $i++;
                    }
                ?>
            </div>
          </div>
      </div>
      
  
   
    <div style="padding:40px;"></div>
    <?php include 'kala_patta.php'; ?>
    <div style="padding:20px;"></div>
    <?php include 'client_panel.php'; ?>
    <div style="padding:20px;"></div>
    <?php include 'footer_strip.php'; ?>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
  </body>
</html>