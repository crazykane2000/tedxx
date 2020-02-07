<?php session_start();
        $price = 0;
        $sum=0;
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
            $data = explode("|" ,$_REQUEST['cust_name']);
            $sql = "INSERT INTO `invoice` (`id`, `customer_id`, `firm_name`, `customer_company`, `invoice_no`, `order_no`, `date`, `payment_terms`, `sales_person`, `item_rates_are`, `discount`, `customer_notes`, `terms_and_conditions`, `due_date`) VALUES (
            NULL, 
            '".htmlentities(mysql_real_escape_string($data[0]))."', 
            '".htmlentities(mysql_real_escape_string($_REQUEST['firm_name']))."',
            '".htmlentities(mysql_real_escape_string($data[1]))."', 
            '".htmlentities(mysql_real_escape_string($_REQUEST['invoice_no']))."', 
            '".htmlentities(mysql_real_escape_string($_REQUEST['order_no']))."', 
            '".htmlentities(mysql_real_escape_string($_REQUEST['date']))."',  
            '".htmlentities(mysql_real_escape_string($_REQUEST['payment_terms']))."', 
            '".htmlentities(mysql_real_escape_string($_REQUEST['sales_person']))."', 
            '".htmlentities(mysql_real_escape_string($_REQUEST['item_rates']))."',  
            '".htmlentities(mysql_real_escape_string($_REQUEST['discount']))."', 
            '".htmlentities(mysql_real_escape_string($_REQUEST['customer_notes']))."', 
            '".htmlentities(mysql_real_escape_string($_REQUEST['terms_and_conditions']))."',
            '".htmlentities(mysql_real_escape_string($_REQUEST['due_date']))."');";
            if(!mysql_query($sql))
            {
              die(mysql_error());
            }
            else
            {
                
                $count = count($_REQUEST['item_desc']);
                for($i=0;$i<$count;$i++)
                {
                    $sql = "INSERT INTO `particulars` (`id`, `invoice_id`, `product`, `qty`, `price`, `tax`) VALUES (
                    NULL, 
                    '".htmlentities(mysql_real_escape_string($_REQUEST['invoice_no']))."', 
                    '".htmlentities(mysql_real_escape_string($_REQUEST['item_desc'][$i]))."', 
                    '".htmlentities(mysql_real_escape_string($_REQUEST['qty'][$i]))."', 
                    '".htmlentities(mysql_real_escape_string($_REQUEST['rate'][$i]))."',  
                    '".htmlentities(mysql_real_escape_string($_REQUEST['tax'][$i]))."');";
                    mysql_query($sql) or die(mysql_error());
                    
                    $price = ($_REQUEST['rate'][$i]+($_REQUEST['rate'][$i]*($_REQUEST['tax'][$i]/100)));
                    $sum+=$price;
                }
                
                $sum = $sum-$_REQUEST['discount'];
                
                
                $ds = "INSERT INTO `tx_timeline_clients` ( `date`, `client_id`, `title`, `amount`, `tx_type`, `status`, `remark`, `invoice_no`, `date_of_trans`) VALUES ( CURRENT_TIMESTAMP, '".$data[0]."', 'New Invoice', '".$sum."', 'credit', '', 'New Invoice Generated', '".$_REQUEST['invoice_no']."', '".date("m/d/Y")."');";
                //echo $ds;
                mysql_query($ds) or die(mysql_error());
                
                header('Location:view_invoice_sample.php?id='.$_REQUEST['id'].'&choice=success&value=Selected Garden Removed Successfully');
                exit();
            }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>