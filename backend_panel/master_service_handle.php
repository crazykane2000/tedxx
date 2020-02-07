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
            if($_FILES['lil_file']['error']>0)
             {
                  header('Location:add_page.php')  ;  
             } 
             else
             {
                $file = date("U").$_FILES['lil_file']['name'];
                move_uploaded_file($_FILES['lil_file']['tmp_name'], "../page/".$file);
                include 'resize_image.php';

                $file_src = "../page/".$file;
                $resizedFile = "../page/thumb/".$file;
                $resizedFile2 = "../page/opt/".$file;

                smart_resize_image($file_src , null, 350 , 350 , false , $resizedFile , false , false ,80 ); 
                 smart_resize_image($file_src , null, 600 , 0 , true , $resizedFile2 , false , false ,80 );   

                 
                 $sql = "INSERT INTO `service` (`id`, `title`, `menu_name`, `description`, `image`, `date`) VALUES (NULL, '".htmlentities(mysql_real_escape_string($_REQUEST['title']))."', 
                 '".htmlentities(mysql_real_escape_string($_REQUEST['menu_name']))."',  
                 '".htmlentities(mysql_real_escape_string($_REQUEST['lil_desc2']))."', 
                 '".$file."', 
                 CURRENT_TIMESTAMP);";
                 
                  if(!mysql_query($sql, $con))
                  {
                    die(mysql_error());
                  }
                  else
                  {
                    header('Location:view_services.php?choice=success&value=Service Has Been Added Successfully');
                  } 
             }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>