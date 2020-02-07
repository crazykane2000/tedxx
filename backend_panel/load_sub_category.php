<?php  
	include 'connection.php';
	$sql = "SELECT sub_category from sub_category WHERE category='".$_REQUEST['var']."'";
	echo $sql;
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($result)){
		echo '<option>'.$row['sub_category'].'</option>';
	}
?>