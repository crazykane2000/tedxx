<html lang="en">
    <?php include 'includes.php'; 
        $sqlo = "SELECT * FROM service WHERE id=".clean($_REQUEST['id']);
        $resulto = mysql_query($sqlo) or die(mysql_error());
        $rata = mysql_fetch_assoc($resulto);
    ?>
  <head>
    <title><?php echo $rata['title']; ?>: <?php include 'title.php'; ?></title>
    <?php include 'head.php'; ?>
  </head>
  <body style="background-color:#fff">
    
    <?php include 'header.php'; ?>   
    
  <div style="background-image:url('img/slide_strip_Divine.jpg');padding:10px">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="headsl" style="color:#fff;font-size:30px;"><?php echo $rata['title']; ?>  </h1>
                <p style="color:#fff"><?php echo $rata['title']; ?></p>
            </div>
        </div>
    </div>
  </div>
    <div style="padding:40px;"></div>
    
      <div class="container">
           <div class="row">
           	<div class="col-sm-6" >
           		<h1 style="font-family:'Roboto Slab'"><?php echo $rata['title']; ?></h1>
           		<hr/>
           		<?php echo htmlspecialchars_decode($rata['description']); ?>
           	</div>
           	
           	<div class="col-sm-6" >
           		 <div style="padding:10px;">
           		 	<img src="page/opt/<?php echo $rata['image'];  ?>" style="width:100%" />
           		 </div>
           	</div>
           </div>
          <hr/>
           <a href="contact.php?product=90" class="btn btn-primary btn-lg">Enquire Now</a>
      </div>
      
    <div style="padding:20px;"></div>
      
      
   
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