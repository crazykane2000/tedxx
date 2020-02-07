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
            
                $ds = "SELECT sample_ids, qtys FROM `orders` WHERE id=".$_REQUEST['id'];
                $result_ds = mysql_query($ds) or die(mysql_error());
                $row_ds = mysql_fetch_assoc($result_ds);
                $data = explode(",", $row_ds['sample_ids']);
                $i=0;
                
                    //print_r($row_ds);
                
                    foreach($data as $mata)
                    {
                        $de = "SELECT balance from purchase_register WHERE id=".$mata;
                        //echo $de;
                        $result_de = mysql_query($de) or die(mysql_error());
                        $row_de = mysql_fetch_assoc($result_de);
                        //print_r($row_de);

                        $balance = $row_de['balance']+$row_ds['qtys'][$i];
                        $sd = "UPDATE `purchase_register` SET `balance`='".$balance."' WHERE id=".$mata;
                        mysql_query($sd);

                    }
                
                    $sql = "DELETE FROM orders WHERE id=".mysql_real_escape_string($_REQUEST['id']);
                    if(!mysql_query($sql))
                    { die(mysql_error()); }
                    else{
                         header('Location:data.php?choice=success&value=Selected Order Removed Successfully');
                    }

                    header('Location:view_orders_final.php?choice=success&value=Selected Order Removed Successfully');
                    exit();
            }
          
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>