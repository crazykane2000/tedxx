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
            $sql = "UPDATE login SET pass='".htmlentities(mysql_real_escape_string($_REQUEST['pass']))."' WHERE user='".htmlentities(mysql_real_escape_string($_REQUEST['user']))."'";
            if(!mysql_query($sql, $con))
            {
              die(mysql_error());
            }
            else
            {
              header('Location:logout.php?choice=success&value=Password of Admin Panel Has Been Changed Succesfully');
            }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>