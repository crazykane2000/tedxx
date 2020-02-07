<?php include 'backend_panel/connection.php';
    $sql = "SELECT * FROM student WHERE enrollment_no LIKE '%".clean(trim($_REQUEST['student_id']))."%'";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_assoc($result);
?>
<table style="font-size:12px;">
    <tr>
        <td style="padding:10px;">
            <img style="width:160px;" src="backend_panel/student/<?php  echo $row['file']; ?>" />
        </td>
            <td>
            <table>
    <tr>
        <td style="padding:6px;"><b>Name</b></td>
        <td  style="padding:6px;"><?php echo $row['student_name']; ?></td>
    </tr>
    
    <tr>
        <td style="padding:6px;"><b>Fathers Name</b></td>
        <td  style="padding:6px;"><?php echo $row['fathers_name']; ?></td>
    </tr>
    
    <tr>
        <td style="padding:6px;"><b>Date of Joining</b></td>
        <td  style="padding:6px;"><?php echo $row['date_of_admission']; ?></td>
    </tr>
    
    <tr>
        <td style="padding:6px;"><b>Course</b></td>
        <td  style="padding:6px;"><?php echo $row['course']; ?></td>
    </tr>
    
    <tr>
        <td style="padding:6px;"><b>Percentage</b></td>
        <td  style="padding:6px;"><?php echo $row['percentage']; ?></td>
    </tr>
    
    <tr>
        <td style="padding:6px;"><b>Mode Of Training</b></td>
        <td  style="padding:6px;"><?php echo $row['mode_of_training']; ?></td>
    </tr>
                
    <tr>
        <td style="padding:6px;"><b>Email id : </b></td>
        <td  style="padding:6px;"><?php echo $row['email_id']; ?></td>
    </tr>
   
</table>
        </td>
    </tr>
</table>