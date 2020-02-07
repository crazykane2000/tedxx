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
              $file = date("U").$_FILES['file']['name'];
              move_uploaded_file($_FILES['file']['tmp_name'], "employee/".$file);
              $resizedFile = "employee/thumb/".$file;
              $resizedFile = "employee/opt/".$file;
              smart_resize_image($file_src , null, 350 , 250 , false , $resizedFile , false , false ,80 );
              smart_resize_image($file_src , null, 700 , 0 , true , $resizedFile2 , false , false ,80 );    
              
              $sql ="INSERT INTO `employee` (`id`, `employee_name`, `fathers_name`, `date_of_joining`, `status`, `date_of_leaving`, `file`, `email_id`, `gender`, `designation`, `employee_id`, `date`) VALUES (
              NULL, 
              '".htmlentities(mysql_real_escape_string($_REQUEST['name']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['father_name']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['joining_date']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['status']))."',  
              '".htmlentities(mysql_real_escape_string($_REQUEST['leaving_date']))."', 
              '".htmlentities(mysql_real_escape_string($file))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['email']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['gender']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['designation']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['employee_id']))."', 
              CURRENT_TIMESTAMP);";

              
                if(!mysql_query($sql, $con))
                {
                  die(mysql_error());
                }   
                else
                {
                    header('Location:view_employees.php?choice=success&value=Employee Has Been Added Successfully');
                }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>