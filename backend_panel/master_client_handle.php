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
             if($_FILES['file']['error']>0)
             {
                  header('Location:add_clientele.php>choice=error&value=Please Attach Image of Client Logo')  ;  
             } 
             else
             {
                $file = date("U").$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], "../client/".$file);
             }
              
              $sql = "INSERT INTO `client` (`id`, `client_title`, `file`, `date`) VALUES (
              NULL, 
              '".clean($_REQUEST['title'])."', 
              '".$file."', 
              CURRENT_TIMESTAMP);";
              
             
              if(!mysql_query($sql))
              {
                  die(mysql_error());
              }
              else
              {
                 header('Location:view_client.php?choice=success&value=Client Added Successfully');
                  exit();
              }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>