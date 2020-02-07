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
              $sql = "UPDATE `page1` SET 
              `title`='".mysql_real_escape_string($_REQUEST['title'])."',
              `description`='".mysql_real_escape_string($_REQUEST['lil_desc'])."',
              `title2`='".mysql_real_escape_string($_REQUEST['title2'])."',
              `description2`='".mysql_real_escape_string($_REQUEST['lil_desc2'])."',
              `remark`='".mysql_real_escape_string($_REQUEST['remark'])."',
              `menu_name`='".mysql_real_escape_string($_REQUEST['menu_name'])."',
              `status`='',
              `category`='".mysql_real_escape_string($_REQUEST['category'])."' WHERE id=".mysql_real_escape_string($_REQUEST['id']);
            
             
            if(!mysql_query($sql))
            {
              die(mysql_error());
            }
            else
            {
              header('Location:view_pages.php?choice=success&value=Selected Pages Have been  Updated Successfully');
              exit();
            }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>