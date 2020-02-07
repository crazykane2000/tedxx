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

            $masand = "";
             if($_FILES['lil_file']['error']>0)
             {
                 $masand = "";
             } 
             else
             {
                $file = date("U").$_FILES['lil_file']['name'];
                move_uploaded_file($_FILES['lil_file']['tmp_name'], "../page/".$file);
                include 'resize_image.php';

                $file_src = "../page/".$file;
                $resizedFile = "../page/thumb/".$file;
                $resizedFile2 = "../page/opt/".$file;

                smart_resize_image($file_src , null, 550 , 400 , false , $resizedFile , false , false ,80 ); 
                smart_resize_image($file_src , null, 600 , 0 , true , $resizedFile2 , false , false ,80 );   
                $masand = ",`file`='".$file."'";
            }


              $sql = "UPDATE `product` SET 
              `product_name`='".mysql_real_escape_string($_REQUEST['title'])."',
              `small_discription`='".mysql_real_escape_string($_REQUEST['lil_desc'])."',
              `description`='".mysql_real_escape_string($_REQUEST['description'])."',
              `status`='".mysql_real_escape_string($_REQUEST['status'])."',
              `brand`='".mysql_real_escape_string($_REQUEST['brand'])."',
              `tag`='".mysql_real_escape_string($_REQUEST['tag'])."',
              `menu_name`='".mysql_real_escape_string($_REQUEST['menu_name'])."',
              `category`='".mysql_real_escape_string($_REQUEST['category'])."',
              `sub_category`='".mysql_real_escape_string($_REQUEST['sub_category'])."'
               ".$masand."
              WHERE id=".mysql_real_escape_string($_REQUEST['id']);
            
             
            if(!mysql_query($sql))
            {
              die(mysql_error());
            }
            else
            {
              header('Location:view_products.php?choice=success&value=Selected Product Have been  Updated Successfully');
              exit();
            }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>