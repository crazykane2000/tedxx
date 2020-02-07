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
              
              $sql = "INSERT INTO `master_people` (`id`, `type`, `name`, `mobile`, `address`, `date`, `business_name`, `website`, `deals_with`, `reference_from`, `year`, `remark`) VALUES (
              NULL, 
               '".htmlentities(mysql_real_escape_string($_REQUEST['type']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['name']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['mobile']))."',  
               '".htmlentities(mysql_real_escape_string($_REQUEST['address']))."',  
              CURRENT_TIMESTAMP, 
               '".htmlentities(mysql_real_escape_string($_REQUEST['business_name']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['website']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['dealing_with']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['reference']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['year']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['remark']))."');";
             
              
              if(!mysql_query($sql))
              {
                  die(mysql_error());
              }
              else
              {
                 header('Location:view_master_people.php?choice=success&value=Person Added Successfully');
                  exit();
              }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>