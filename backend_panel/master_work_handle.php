<?php session_start();
      //print_r($_FILES);
      if(isset($_SESSION['user'], $_SESSION['loged_primitives']))
      {
          include 'connection.php';
          $sql = "SELECT * FROM login WHERE user = 
          '".htmlentities(mysql_real_escape_string($_SESSION['user']))."'";
          $result = mysql_query($sql, $con) or die(mysql_error());
          $row = mysql_fetch_assoc($result);
          $pass = md5($row['pass']);
           //print_r($_FILES);
          
           $sql = "INSERT INTO `work_category` (`id`,  `title`, `description`, `tags`, `title_image_ka`, `date`) VALUES 
            (
              NULL, 
              '".htmlentities(mysql_real_escape_string($_REQUEST['title']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['description']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['tags']))."', 
               '".htmlentities(mysql_real_escape_string($_REQUEST['image_title']))."', 
              CURRENT_TIMESTAMP);";

            if(!mysql_query($sql, $con))
            {
              die(mysql_error());
            } 
          else
          {
              header('Location:view_work.php?choice=success&value=Work Has Been Added Successfully');
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>