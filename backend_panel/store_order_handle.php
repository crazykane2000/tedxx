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
                           
              //print_r($_REQUEST);
              $ids = implode(",", $_REQUEST['id']);
              $prices = implode(",", $_REQUEST['price']);
              $qtys = implode(",", $_REQUEST['qty']);
              $sql = "INSERT INTO `orders` (`id`, `sample_ids`, `party_name`, `date`, `remark`, `prices`, `qtys`) 
              VALUES (
              NULL, 
               '".htmlentities(mysql_real_escape_string($ids))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['party_name']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['order_date']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['remark']))."',  
               '".htmlentities(mysql_real_escape_string($prices))."', 
               '".htmlentities(mysql_real_escape_string($qtys))."');";
             // print_r($_REQUEST);
              
              
                $sa = "SELECT `balance` FROM purchase_register WHERE id IN(".$ids.")";
                $result_sa = mysql_query($sa) or die(mysql_error());
                $i=0;
                while($row_sa = mysql_fetch_array($result_sa))
                {
                    $balance = $row_sa['balance']-$_REQUEST['qty'][$i];
                    //echo $balance.",";
                    $sd = "UPDATE `purchase_register` SET `balance`='".$balance."' WHERE id=".$_REQUEST['id'][$i];
                    mysql_query($sd);
                    $i++;
                }
             
             if(!mysql_query($sql))
              {
                  die(mysql_error());
              }
              else
              {
                 header('Location:view_orders_final.php?choice=success&value=Order Added Successfully');
                 exit();
              }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>