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
            $status = $_REQUEST['status'];
            //  echo $status;            
            $data = explode("/", $status);
            
              
            $sql = "INSERT INTO `order_status` (`id`, `status`, `color`, `remark`, `qty_delivered`, `date`, `order_id`) VALUES (
            NULL, 
            '".htmlentities(mysql_real_escape_string($data[0]))."', 
            '".htmlentities(mysql_real_escape_string($data[1]))."', 
            '".htmlentities(mysql_real_escape_string($_REQUEST['remarks']))."', 
            '".htmlentities(mysql_real_escape_string($_REQUEST['delivered_qty']))."', 
            CURRENT_TIMESTAMP,
            '".htmlentities(mysql_real_escape_string($_REQUEST['id']))."');";
            if(!mysql_query($sql))
            {
              die(mysql_error());
            }
            else
            {
                if($data[0]=="Delivered")
                {
                   $dc = "UPDATE orders SET `status`='".$data[0]."' WHERE id=".$_REQUEST['id']; 
                   mysql_query($dc) or die(mysql_error());
                }
                else
                {
                    $dc = "UPDATE orders SET `status`='Pending'"; 
                    mysql_query($dc) or die(mysql_error());
                }
                    
                header('Location:orders_status.php?id='.$_REQUEST['id'].'&choice=success&value=Selected Sample Removed Successfully');
                exit();
            }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>s