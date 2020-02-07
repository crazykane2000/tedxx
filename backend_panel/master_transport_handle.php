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
              $sql = "INSERT INTO `master_transport` (`id`, `transport_name`, `owner_name`, `address`, `mobile`, `remark`, `date`) VALUES (
              NULL, 
              '".htmlentities(mysql_real_escape_string($_REQUEST['name']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['owner_name']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['address']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['contact']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['remarks']))."', 
              CURRENT_TIMESTAMP);";
              if(!mysql_query($sql))
              {
                  die(mysql_error());
              }
              else
              {
                 header('Location:view_master_transport.php?choice=success&value=Transport Vendor Added Successfully');
                  exit();
              }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>