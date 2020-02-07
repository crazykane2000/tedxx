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
              if($_FILES['file_lil']['error']>0)
             {
                  header('Location:add_news.php')  ;  
             } 
             else
             {
                $file = date("U").$_FILES['file_lil']['name'];
                move_uploaded_file($_FILES['file_lil']['tmp_name'], "../news/".$file);
                include 'resize_image.php';

                $file_src = "../news/".$file;
                $resizedFile = "../news/thumb/".$file;
                $resizedFile2 = "../news/opt/".$file;

                smart_resize_image($file_src , null, 350 , 350 , false , $resizedFile , false , false ,80 ); 
                smart_resize_image($file_src , null, 600 , 0 , true , $resizedFile2 , false , false ,80 );   

                  $sql = "INSERT INTO `news` (`id`, `title`, `description`, `date`, `file`) VALUES (
                  NULL, 
                  '".clean($_REQUEST['title'])."', 
                 '".clean($_REQUEST['lil_desc2'])."', 
                  CURRENT_TIMESTAMP, 
                  '".$file."');";
                  

                  if(!mysql_query($sql, $con))
                  {
                    die(mysql_error());
                  }
                  else
                  {
                    header('Location:view_pages.php?choice=success&value=page Has Been Added Successfully');
                  }     
             }
                           
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>