<?php
require_once "mailer/PHPMailerAutoload.php";

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {	




//CONTACT US...
if ($_POST['option'] == 'form-cyber')
{	
	$error = array();//Declare An Array to store any error message  
	$name = trim(strip_tags($_POST['fullname']));
    $organisation = trim(strip_tags($_POST['organisation']));
	$phone = trim(strip_tags($_POST['phone']));
	$email = trim(strip_tags($_POST['email']));
    $category = trim(strip_tags($_POST['category']));
	$comment = $_POST['message'];



	if(empty($name))
	{
		$error[] =  'Please enter full name !';

	}

	 if (!preg_match("#([A-Za])$#i", $name))

	{
	    $error[] = 'Full name not valid ! it must start with capital letter and must be only alphabetical characters';

		}

		if (strlen($name) > 50 )
		{
			 $error[] = 'Full name must not exceed 50 characters!';
		}


		if(empty($phone))
	{
		$error[] = 'Please enter phone number !';
	}

//	 if (!preg_match("[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$", $phone))
//
//	{
//	    $error[] = 'Phone number not valid!';
//
//		}


		if (strlen($phone) > 15 )
		{
			 $error[] = 'Phone number must not exceed 15 numbers!';
		}


		if(empty($email))
	{
		$error[] ='Please enter email !';
	}

	 if (!preg_match("#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i", $email))

		{
	    $error[] = 'Your email address is invalid';

		}




		if(empty($error)) {


//            echo "<h4 style='color:#046a88' class=' Proxima_Nova_Bold'></h4>";
            $message = '<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
 <title>National Cyber Security Center | Cyber Report</title>
         <link rel="shortcut icon" href="" />
         <link rel="stylesheet" type="text/css" href="">
          <style type="text/css">
 .wrap{
    width: 720px;
    margin: 15px auto;
    padding: 15px 20px;
    background: white;
    border: 2px solid #DBDBDB;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    overflow: hidden;
}
          </style>

</head>';

            $message = '<body>
  <div class="wrap">
       
<p />
<center><h3>Cyber Crime Report from Website Online Form</h3></center>
<p />
   
      <table>
 <tr>
   <td>
   <p>
    Report From : ' . $name . ' <br />
    Organisation: ' . $organisation . ' <br />
    Telephone Number : ' . $phone . ' <br />
    Email : ' . $email . '      <br />
    Category: ' . $category . ' <br />
    Message : ' . $comment . ' 
    </p>
   </td>
 </tr>
</table>
<hr />
    </div>  
</body>
</html>';

            $mail = new PHPMailer();

            $senderMail = "eric.badger@cybersecurity.gov.gh";
            $pwd = "TempPass1@";

            //   try {
            $mail->IsSMTP();

            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls'; //tls or ssl
            // $mail->Host = "ssl://smtp.googlemail.com"; //smtp host address
            $mail->Host = "smtp.office365.com";
            $mail->Port = 587; //host port -- port: 465 if you using SSL

            $mail->Username = $senderMail; //username or email
            $mail->Password = $pwd; //password

            $mail->setFrom($senderMail, 'Website Online Form');
            $mail->addAddress('report@cybersecurity.gov.gh');
            $mail->addReplyTo('report@cybersecurity.gov.gh');

            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = "Online Form Report on Cyber Crime";

            $mail->Body = $message;
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Report successfully sent! We will contact you shortly';
            }
        }


		else{

			foreach ($error as $key => $values) {
            
            echo '  "'.$values.'"';


               }
		
		}



	} // end of the Contact us...

    else if (($_POST['option'] == 'form-data')) {
        $error = array();//Declare An Array to store any error message
        $fname = trim(strip_tags($_POST['fname']));
        $lname = trim(strip_tags($_POST['lname']));
        $email = trim(strip_tags($_POST['email']));
        $comment = $_POST['message'];



        if(empty($fname))
        {
            $error[] =  'Please enter first name !';

        }

        if (!preg_match("#([A-Za])$#i", $fname))

        {
            $error[] = 'First name not valid ! it must start with capital letter and must be only alphabetical characters';

        }

        if (strlen($fname) > 50 )
        {
            $error[] = 'First name must not exceed 50 characters!';
        }

        if(empty($lname))
        {
            $error[] =  'Please enter last name !';

        }

        if (!preg_match("#([A-Za])$#i", $lname))

        {
            $error[] = 'Last name not valid ! it must start with capital letter and must be only alphabetical characters';

        }

        if (strlen($lname) > 50 )
        {
            $error[] = 'Last name must not exceed 50 characters!';
        }

        if(empty($email))
        {
            $error[] ='Please enter email !';
        }

        if (!preg_match("#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i", $email))

        {
            $error[] = 'Your email address is invalid';

        }




        if(empty($error))
        {


//            echo "<h4 style='color:#046a88' class=' Proxima_Nova_Bold'>Report successfully sent! We will contact you shortly</h4>";
            $message = '<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
 <title>National Cyber Security Center | Data Privacy Report</title>
         <link rel="shortcut icon" href="" />
         <link rel="stylesheet" type="text/css" href="">
          <style type="text/css">
 .wrap{
    width: 720px;
    margin: 15px auto;
    padding: 15px 20px;
    background: white;
    border: 2px solid #DBDBDB;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    overflow: hidden;
}
          </style>

</head>';

            $message = '<body>
  <div class="wrap">
       
<p />
<center><h3>Data Privacy Report from Website Online Form</h3></center>
<p />
   
      <table>
 <tr>
   <td>
   <p>
    Report From : '.$fname.' '.$lname.'<br />
    Email : '.$email.'      <br />
    Message : '.$comment.' 
    </p>
   </td>
 </tr>
</table>
<hr />
    </div>  
</body>
</html>';
            $mail = new PHPMailer();

            $senderMail = "eric.badger@cybersecurity.gov.gh";
            $pwd = "TempPass1@";

            //   try {
            $mail->IsSMTP();

            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls'; //tls or ssl
            // $mail->Host = "ssl://smtp.googlemail.com"; //smtp host address
            $mail->Host = "smtp.office365.com";
            $mail->Port = 587; //host port -- port: 465 if you using SSL

            $mail->Username = $senderMail; //username or email
            $mail->Password = $pwd; //password

            $mail->setFrom($senderMail, 'Website Online Form');
            $mail->addAddress('report@cybersecurity.gov.gh');
            $mail->addReplyTo('report@cybersecurity.gov.gh');

            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = "Online Form Report on Data Privacy";

            $mail->Body = $message;
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Report successfully sent! We will contact you shortly';
            }
        }


        else{

            foreach ($error as $key => $values) {

                echo '  "'.$values.'"';


            }

        }
    }

    else if (($_POST['option'] == 'form-crime')) {
        $error = array();//Declare An Array to store any error message
        $fullname = trim(strip_tags($_POST['fullname']));
        $sex = trim(strip_tags($_POST['sex']));
        $age = trim(strip_tags($_POST['age']));
        $email = trim(strip_tags($_POST['email']));
        $phone = trim(strip_tags($_POST['phone']));
        $comment = $_POST['message'];



        if(empty($fullname))
        {
            $error[] =  'Please enter full name !';

        }

        if (!preg_match("#([A-Za])$#i", $fullname))

        {
            $error[] = 'Full name not valid ! it must start with capital letter and must be only alphabetical characters';

        }

        if (strlen($fullname) > 50 )
        {
            $error[] = 'Full name must not exceed 50 characters!';
        }

        if(empty($sex))
        {
            $error[] =  'Please enter your age !';

        }



        if(empty($age))
        {
            $error[] = 'Please enter your age !';
        }

        if (strlen($phone) > 50 )
        {
            $error[] = 'Full name must not exceed 50 characters!';
        }


        if(empty($phone))
        {
            $error[] = 'Please enter phone number !';
        }


        if (strlen($phone) > 15 )
        {
            $error[] = 'Phone number must not exceed 15 numbers!';
        }

        if(empty($email))
        {
            $error[] ='Please enter email !';
        }

        if (!preg_match("#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i", $email))

        {
            $error[] = 'Your email address is invalid';

        }




        if(empty($error))
        {


//            echo "<h3 style='color:#046a88' class=' Proxima_Nova_Bold'>Report successfully sent! We will contact you shortly</h3>";
            $message = '<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
 <title>National Cyber Security Center | Data Privacy Report</title>
         <link rel="shortcut icon" href="" />
         <link rel="stylesheet" type="text/css" href="">
          <style type="text/css">
 .wrap{
    width: 720px;
    margin: 15px auto;
    padding: 15px 20px;
    background: white;
    border: 2px solid #DBDBDB;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    overflow: hidden;
}
          </style>

</head>';

            $message = '<body>
  <div class="wrap">
       
<p />
<center><h3>Criminal Report from Website Online Form</h3></center>
<p />
   
      <table>
 <tr>
   <td>
   <p>
    Report From: '.$fullname.'<br />
    Gender: '.$sex.'<br />
    Age: '.$age.'<br />
    Email: '.$email.'      <br />
    Telephone: '.$phone.'<br />
    Message: '.$comment.' 
    </p>
   </td>
 </tr>
</table>
<hr />
    </div>  
</body>
</html>';

            $mail = new PHPMailer();

            $senderMail = "eric.badger@cybersecurity.gov.gh";
            $pwd = "TempPass1@";

            //   try {
            $mail->IsSMTP();

            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls'; //tls or ssl
            // $mail->Host = "ssl://smtp.googlemail.com"; //smtp host address
            $mail->Host = "smtp.office365.com";
            $mail->Por0t = 587; //host port -- port: 465 if you using SSL

            $mail->Username = $senderMail; //username or email
            $mail->Password = $pwd; //password

            $mail->setFrom($senderMail, 'Website Online Form');
            $mail->addAddress('report@cybersecurity.gov.gh');
            $mail->addReplyTo('report@cybersecurity.gov.gh');

            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = "Online Form Report on Other Crime";

            $mail->Body = $message;
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Report successfully sent! We will contact you shortly';
            }
        }


        else{

            foreach ($error as $key => $values) {

                echo '  "'.$values.'"';


            }

        }
    }

} // end of the main if...



else{
	echo ('Bad Request !');
}



?>