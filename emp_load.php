<?php include 'backend_panel/connection.php';
    //echo $_REQUEST['employee_id'];
    $sql = "SELECT * FROM employee WHERE employee_id LIKE '%".clean(trim($_REQUEST['employee_id']))."%'";
    //echo $sql;
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_assoc($result);

    //print_r($row);
?>
<table style="font-size:13px;">
    <tr>
        <td style="padding:10px;">
            <img style="width:160px;" src="backend_panel/employee/<?php  echo $row['file']; ?>" />
        </td>
            <td>
            <table>
    <tr>
        <td style="padding:6px;"><b>Name</b></td>
        <td  style="padding:6px;"><?php echo $row['employee_name']; ?></td>
    </tr>
    
    <tr>
        <td style="padding:6px;"><b>Fathers Name</b></td>
        <td  style="padding:6px;"><?php echo $row['fathers_name']; ?></td>
    </tr>
    
    <tr>
        <td style="padding:6px;"><b>Date of Joining</b></td>
        <td  style="padding:6px;"><?php echo $row['date_of_joining']; ?></td>
    </tr>
    
    <tr>
        <td style="padding:6px;"><b>Date of Leaving</b></td>
        <td  style="padding:6px;"><?php echo $row['date_of_leaving']; ?></td>
    </tr>
    
    <tr>
        <td style="padding:6px;"><b>Designation</b></td>
        <td  style="padding:6px;"><?php echo $row['designation']; ?></td>
    </tr>
    
    <tr>
        <td style="padding:6px;"><b>Gender</b></td>
        <td  style="padding:6px;"><?php echo $row['gender']; ?></td>
    </tr>
   
</table>
        </td>
    </tr>
</table>