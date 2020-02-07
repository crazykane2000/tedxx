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
             // print_r($_REQUEST);
              $sql = "INSERT INTO `purchase_register` (
              `id`, 
              `broker_name`,
              `consigner_name`, 
              `purchase_date`,
              `garden_mark`, 
              `invoice_no`,
              `qty_bag`, 
              `qty_kg`, 
              `price`, 
              `transport`, 
              `transport_builty_no`, 
              `good_status`,
              `status_date`, 
              `purchase_sample`, 
              `bag_sample`,
              `bill_no`, 
              `bill_date`, 
              `consignment_no`, 
              `box_no`, 
              `quality`, 
              `date_of_first_entry`, 
              `grade`, `balance`) VALUES (
              NULL, 
              '".htmlentities(mysql_real_escape_string($_REQUEST['broker_name']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['party_name']))."',
              '".htmlentities(mysql_real_escape_string($_REQUEST['purchase_date']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['garden_mark']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['invoice_no']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['qty_bags']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['qty_per_bag']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['price']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['transport_name']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['trans_builty_no']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['good_status']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['transport_status_date']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['purchase_sample']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['bag_sample']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['bill_no']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['bill_date']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['consignmen_no']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['box_number']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['quality']))."', 
               CURRENT_TIMESTAMP,  
              '".htmlentities(mysql_real_escape_string($_REQUEST['grade']))."',
              '".htmlentities(mysql_real_escape_string($_REQUEST['qty_bags']))."');";
             
              
              //echo $sql;
             
                           
             if(!mysql_query($sql))
              {
                  die(mysql_error());
              }
              else
              {
                 header('Location:view_purchase_register.php?choice=success&value=Status Added Successfully');
                 exit();
              }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>