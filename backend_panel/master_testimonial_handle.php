<?php session_start();
      if(isset($_SESSION['user'], $_SESSION['loged_primitives']))
      {
          include 'connection.php';
          $sql = "SELECT * FROM login WHERE user = '".htmlentities(mysql_real_escape_string($_SESSION['user']))."'";
          $result = mysql_query($sql, $con) or die(mysql_error());
          $row = mysql_fetch_assoc($result);
          $pass = md5($row['pass']);

          if($pass != $_SESSION['loged_primitives'])
          {
             header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
          }
          else
          {
              
              $sql = "INSERT INTO `testimonials` (`id`, `name`, `testimonial`, `date`) VALUES (
              NULL, 
              '".$_REQUEST['name']."', 
              '".$_REQUEST['testimonial']."', 
              CURRENT_TIMESTAMP);";              
              if(!mysql_query($sql))
              {
                  die(mysql_error());
              }
              else
              {
                 header('Location:view_testimonials.php?choice=success&value=Testimonial Added Successfully');
                  exit();
              }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>