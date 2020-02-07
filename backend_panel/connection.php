<?php 
	$con = mysql_connect("localhost", "divine_web1", "divinepl,okm987*") or die(mysql_error());
	mysql_select_db("divine_web") or die(mysql_error());

    function clean($data)
    {
        $data = str_replace("'", "", $data);
        $data = str_replace("`", "", $data);
        $data = str_replace("\"", "", $data);
        $data = str_replace("SELECT *", "", $data);
        $data = str_replace("OR", "", $data);
        return $data;
    }
?>