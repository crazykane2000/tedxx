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
            $sql = "DELETE FROM master_quality WHERE id=".mysql_real_escape_string($_REQUEST['id']);
            if(!mysql_query($sql))
            {
              die(mysql_error());
            }
            else
            {
              header('Location:view_master_quality.php?choice=success&value=Selected Quality Removed Successfully');
              exit();
            }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>