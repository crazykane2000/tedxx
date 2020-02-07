<?php session_start();
      //print_r($_SESSION);
      if(isset($_SESSION['user'], $_SESSION['loged_primitives']))
      {
          include 'connection.php';
          $sql = "SELECT * FROM login WHERE user = '".htmlentities(mysql_real_escape_string($_SESSION['user']))."'";
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
                $ds = "INSERT INTO `tx_timeline_clients` ( `date`, `client_id`, `title`, `amount`, `tx_type`, `status`, `remark`, `invoice_no`, `date_of_trans`) VALUES ( CURRENT_TIMESTAMP, '".$_REQUEST['customer_id']."', '".$_REQUEST['type']." ₹ ".$_REQUEST['amount']."', '".$_REQUEST['amount']."', '".$_REQUEST['type']."', '', '".$_REQUEST['remark']."','".$_REQUEST['invoice_no']."', '".$_REQUEST['date']."' );";
               
              //echo $ds;
          if(!mysql_query($ds))
            {
              die(mysql_error());
            }
            else
            {
              header('Location:view_invoice_sample.php?id='.$_REQUEST['id'].'&choice=success&value=Payment Added');
                exit();
            }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>