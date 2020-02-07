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
              print_r($_REQUEST);
              $ids = implode(",", $_REQUEST['id']);
              $prices = implode(",", $_REQUEST['price']);
              $sql = "INSERT INTO `store_order` (`id`, `sample_ids`, `party_name`, `date`, `remark`, `prices`) 
              VALUES (
              NULL, 
               '".htmlentities(mysql_real_escape_string($ids))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['party_name']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['order_date']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['remark']))."',  
                 '".htmlentities(mysql_real_escape_string($prices))."');";
             // print_r($_REQUEST);
             
             if(!mysql_query($sql))
              {
                  die(mysql_error());
              }
              else
              {
                 header('Location:view_orders.php?choice=success&value=Order Added Successfully');
                 exit();
              }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>