<?php session_start();
    $_SESSION['data'] ="true";
	include 'backend_panel/connection.php';
    
    $sql = "INSERT INTO `subscribers` (`id`, `email`, `date`) VALUES (
    NULL, 
    '".htmlentities(mysql_real_escape_string($_REQUEST['email']))."', 
    CURRENT_TIMESTAMP);";

   
	if(!mysql_query($sql))
	{
		die(mysql_error());
	}
	else
	{
        $to = "ajayanandctg@gmail.com";
        $sub = "Subscriber Message From Your Website www.ctgsecurities.com";
        
        $headers.= "Reply-To: ".htmlentities(mysql_real_escape_string($_REQUEST['email']))." <noreply@ctgsecurities.com>\r\n";
        $headers.= "X-Mailer: PHP/" . phpversion()."\r\n";
        $headers.= "MIME-Version: 1.0" . "\r\n";
        $headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
        $message = "The Details of The Message Are <br/><br/>
            <b>Email </b> : ".htmlentities(mysql_real_escape_string($_REQUEST['email']))."<br/>";
        
        	mail($to, $sub, $message, $headers);
         	mail("crazykane2000@gmail.com", $sub, $message, $headers);
          $msg = urlencode("Thanks ".$_REQUEST['name']." for Contacting CTG Security Solutions. We Will Get Back To You Shortly on Your Contact No.".$_REQUEST['contact']. " For Helping You");

        //$data = file_get_contents("http://sms1.catpops.in/api/swsend.asp?username=t1agrawal&password=10136964&sender=CGYUVA&sendto=    9893598839&message=".$msg);
        //$data = file_get_contents("http://sms1.catpops.in/api/swsend.asp?username=t1agrawal&password=10136964&sender=CGYUVA&sendto=".urlencode($_REQUEST['phone'])."&message=".$msg);
       // echo $data;
		header('Location:thanks.php?choice=success&value=Thanks for Subscribing With CTG Security Solutions');
        exit();
	}

        
      
?>s