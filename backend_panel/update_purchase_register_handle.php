<?php session_start();
      //print_r($_SESSION);
      if(isset($_SESSION['user'], $_SESSION['loged_primitives']))
      {
          include 'connection.php';
          $sql = "SELECT * FROM login WHERE user = 
          '".htmlentities(mysql_real_escape_string($_SESSION['user']))."'";
          $result = mysql_query($sql, $con) or die(mysql_error());
          $row = mysql_fetch_assoc($result);
          $pass = md5($row['pass']);
          // print_r($row);
          if($pass != $_SESSION['loged_primitives'])
          {
             header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
          }
          else
          {
            $sql = "UPDATE purchase_register SET
            `broker_name`='".mysql_real_escape_string($_REQUEST['broker_name'])."',
            `consigner_name`='".mysql_real_escape_string($_REQUEST['party_name'])."',
            `purchase_date`='".mysql_real_escape_string($_REQUEST['purchase_date'])."',
            `garden_mark`='".mysql_real_escape_string($_REQUEST['garden_mark'])."',
            `invoice_no`='".mysql_real_escape_string($_REQUEST['invoice_no'])."',
            `qty_bag`='".mysql_real_escape_string($_REQUEST['qty_bags'])."',
            `qty_kg`='".mysql_real_escape_string($_REQUEST['qty_per_bag'])."',
            `price`='".mysql_real_escape_string($_REQUEST['price'])."',
            `transport`='".mysql_real_escape_string($_REQUEST['transport_name'])."',
            `transport_builty_no`='".mysql_real_escape_string($_REQUEST['trans_builty_no'])."',
            `good_status`='".mysql_real_escape_string($_REQUEST['good_status'])."',
            `status_date`='".mysql_real_escape_string($_REQUEST['transport_status_date'])."',
            `purchase_sample`='".mysql_real_escape_string($_REQUEST['purchase_sample'])."',
            `bag_sample`='".mysql_real_escape_string($_REQUEST['bag_sample'])."',
            `bill_no`='".mysql_real_escape_string($_REQUEST['bill_no'])."',
            `bill_date`='".mysql_real_escape_string($_REQUEST['bill_date'])."',
            `consignment_no`='".mysql_real_escape_string($_REQUEST['consignmen_no'])."',
            `box_no`='".mysql_real_escape_string($_REQUEST['box_number'])."',
            `quality`='".mysql_real_escape_string($_REQUEST['quality'])."',
            `grade`='".mysql_real_escape_string($_REQUEST['grade'])."'            
            WHERE id=".mysql_real_escape_string($_REQUEST['id']);
            if(!mysql_query($sql))
            {
              die(mysql_error());
            }
            else
            {
              header('Location:view_purchase_register.php?choice=success&value=Selected Purchase Register Updated Successfully');
              exit();
            }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>