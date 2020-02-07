<?php 
    include_once 'backend_panel/connection.php';

    function clean1($data)
    {
        $data = str_replace("'", "", $data);
        return $data;
    }
?>