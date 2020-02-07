<?php session_start();
    $_SESSION['data'] ="true";
	include 'backend_panel/connection.php';
	$sql = "INSERT INTO `contact_data` (`id`, `name`, `mobile`, `email`, `query`, `date`) 
	VALUES (NULL, 
		'".htmlentities(mysql_real_escape_string($_REQUEST['name']))."', 
		'".htmlentities(mysql_real_escape_string($_REQUEST['contact']))."', 
		'".htmlentities(mysql_real_escape_string($_REQUEST['email']))."', 
		'".htmlentities(mysql_real_escape_string($_REQUEST['query']))."', 
		CURRENT_TIMESTAMP);";

	if(!mysql_query($sql))
	{
		die(mysql_error());
	}
	else
	{
        $to = "shashank@divineengineering.net";
        $sub = "Contact Message From Your Website www.divineengineering.net";
        
        $headers= "From: ".htmlentities(mysql_real_escape_string($_REQUEST['name']))." <Website@divineengineering.net>\r\n";
        $headers.= "Reply-To: ".htmlentities(mysql_real_escape_string($_REQUEST['name']))." <".$_REQUEST['email'].">\r\n";
        $headers.= "X-Mailer: PHP/" . phpversion()."\r\n";
        $headers.= "MIME-Version: 1.0" . "\r\n";
        $headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
        $message = "The Details of The Message Are <br/><br/>
            <b>Name </b> : ".htmlentities(mysql_real_escape_string($_REQUEST['name']))."<br/>
            <b>Mobile </b> : ".htmlentities(mysql_real_escape_string($_REQUEST['contact']))."<br/>
            <b>Email </b> : ".htmlentities(mysql_real_escape_string($_REQUEST['email']))."<br/>
            <b>Query </b> : ".htmlentities(mysql_real_escape_string($_REQUEST['query']))."<br/>";
        
        	mail($to, $sub, $message, $headers);
         	mail("crazykane2000@gmail.com", $sub, $message, $headers);
          $msg = urlencode("Thanks ".$_REQUEST['name']." for Contacting Divine Engineering. We Will Get Back To You Shortly on Your Contact No.".$_REQUEST['contact']. " For Helping You");



	
	
            $data = file_get_contents("http://sms1.catpops.in/api/swsend.asp?username=t1divinee&password=33908631&sender=DIVINE&sendto=7400723999&message=".$msg);
            $data = file_get_contents("http://sms1.catpops.in/api/swsend.asp?username=t1divinee&password=33908631&sender=DIVINE&sendto=".urlencode($_REQUEST['contact'])."&message=".$msg);
       // echo $data;
		header('Location:contact.php?choice=success&value=Your Query Has Been Submitted, One Of Our Representative will Talk to you Shortly.');
        exit();
	}

        
      
?>