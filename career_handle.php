<?php session_start();

    $_SESSION['data'] ="true";
	include 'backend_panel/connection.php';

    $sql = "INSERT INTO `career_requests` (`id`, `name`, `email`, `contact`, `query`, `subscriber`, `post`, `date`) VALUES (
    NULL, 
    '".htmlentities(mysql_real_escape_string($_REQUEST['name']))."', 
    '".htmlentities(mysql_real_escape_string($_REQUEST['email']))."', 
    '".htmlentities(mysql_real_escape_string($_REQUEST['contact']))."', 
    '".htmlentities(mysql_real_escape_string($_REQUEST['query']))."', 
    '".htmlentities(mysql_real_escape_string($_REQUEST['subscriber']))."', 
    '".htmlentities(mysql_real_escape_string($_REQUEST['subscriber']))."', 
    CURRENT_TIMESTAMP);";
	
	if(!mysql_query($sql))
	{
		die(mysql_error());
	}
	else
	{
        $to = "support@catpops.in";
        $sub = "Career Request Message From Your Website Catpops.in";
        
        $headers= "From: ".htmlentities(mysql_real_escape_string($_REQUEST['name']))." <career@catpops.in>\r\n";
        $headers.= "Reply-To: ".htmlentities(mysql_real_escape_string($_REQUEST['name']))." <".htmlentities(mysql_real_escape_string($_REQUEST['email'])).">\r\n";
        $headers.= "X-Mailer: PHP/" . phpversion()."\r\n";
        $headers.= "MIME-Version: 1.0" . "\r\n";
        $headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
        $message = "The Details of The Message Are <br/><br/>
            <b>Name </b> : ".htmlentities(mysql_real_escape_string($_REQUEST['name']))."<br/>
             <b>Contact </b> : ".htmlentities(mysql_real_escape_string($_REQUEST['contact']))."<br/>
              <b>Fro Post </b> : ".htmlentities(mysql_real_escape_string($_REQUEST['post']))."<br/>
               <b>email </b> : ".htmlentities(mysql_real_escape_string($_REQUEST['email']))."<br/>
                <b>Query </b> : ".htmlentities(mysql_real_escape_string($_REQUEST['query']))."<br/>
               <br/>";
        
        	mail($to, $sub, $message, $headers);
         	mail("crazykane2000@gmail.com", $sub, $message, $headers);
          $msg = urlencode("Thanks ".$_REQUEST['name']." for Contacting Catpops Technobiz. We Will Get Back To You Shortly on Your Contact No.".$_REQUEST['contact']. " For Helping You");

                 $data = file_get_contents("http://sms1.catpops.in/api/swsend.asp?username=t1agrawal&password=10136964&sender=CGYUVA&sendto=    9893598839&message=".$msg);
                  $data = file_get_contents("http://sms1.catpops.in/api/swsend.asp?username=t1agrawal&password=10136964&sender=CGYUVA&sendto=".urlencode($_REQUEST['contact'])."&message=".$msg);
       // echo $data;
		header('Location:career_inner.php?id='.htmlentities(mysql_real_escape_string($_REQUEST['id'])).'&choice=success&value=Your Query Has Been Submitted, One Of Our Representative will Talk to you Shortly.');
		exit();
		header('Location:contact.php?choice=success&value=Your Query Has Been Posted Successfully!');
	}

        
      
?>