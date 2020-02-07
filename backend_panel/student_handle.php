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
              
              move_uploaded_file($_FILES['file']['tmp_name'], "student/".$file);
              $file_src = "student/".$file;
              $resizedFile = "student/thumb/".$file;
              $resizedFile2 = "student/opt/".$file;
              smart_resize_image($file_src , null, 350 , 250 , false , $resizedFile , false , false ,80 );
              smart_resize_image($file_src , null, 700 , 0 , true , $resizedFile2 , false , false ,80 );    
              
              $sql="INSERT INTO `student` (`id`, `student_name`, `fathers_name`, `date_of_admission`, `course`, `percentage`, `mode_of_training`, `file`, `gender`, `enrollment_no`, `email_id`, `date`) VALUES (
              NULL, 
              '".htmlentities(mysql_real_escape_string($_REQUEST['name']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['father_name']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['admission_date']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['course']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['percentage']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['mode_of_training']))."', 
              '".htmlentities(mysql_real_escape_string($file))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['gender']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['enrollment_id']))."', 
              '".htmlentities(mysql_real_escape_string($_REQUEST['email']))."', 
              CURRENT_TIMESTAMP);";
              
                if(!mysql_query($sql, $con))
                {
                  die(mysql_error());
                }   
                else
                {
                    header('Location:view_student.php?choice=success&value=Student Has Been Added Successfully');
                }
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>