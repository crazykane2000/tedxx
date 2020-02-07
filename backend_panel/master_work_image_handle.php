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
          if($pass != $_SESSION['loged_primitives'])
          {
             header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
          }
          else
          { 
             include 'resize_image.php';

             $count = count($_FILES['file']['name']);
             $file = array();

             for ($i=0; $i < $count; $i++) { 
               if($_FILES['file']['error'][$i]>0)
               {
                    header('Location:add_gallery.php')  ;  
               } 
               else
               {
                  $file = date("U").$_FILES['file']['name'][$i];
                  move_uploaded_file($_FILES['file']['tmp_name'][$i], "../work/".$file);
                 
                  $file_src = "../work/".$file;
                  $resizedFile = "../work/opt/".$file;
                  $resizedFile2 = "../work/thumb/".$file;

                  smart_resize_image($file_src , null, 350 , 250 , false , $resizedFile , false , false ,80 );
                  smart_resize_image($file_src , null, 700 , 0 , true , $resizedFile2 , false , false ,80 );               
                   
                   $data = explode("|",$_REQUEST['category']);
                    //print_r($data);
                   
                    $id = $data[0];
                    $categ = $data[1];
                   
                   $sql = "INSERT INTO `work_images` (`id`,  `files`, `category`,`category_id`, `date`) VALUES 
                    (
                      NULL, 
                      '".htmlentities(mysql_real_escape_string($file))."', 
                      '".htmlentities(mysql_real_escape_string($categ))."',
                       '".htmlentities(mysql_real_escape_string($id))."',
                      CURRENT_TIMESTAMP);";
                    
                    if(!mysql_query($sql, $con))
                    {
                      die(mysql_error());
                    }                   
               }
             }
             header('Location:view_work_images.php?choice=success&value=Work Images Has Been Added Successfully');
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>