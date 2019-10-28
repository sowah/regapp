<?php
require_once('connect.php');
require_once "mailer/PHPMailerAutoload.php";

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    if ($_POST['option'] == 'form-register') {
        $success = array("message" => ("success"));
        $duplicate_error = array("message" => ("You have registered already"));
        $name = trim(strip_tags($_POST['fullname']));
        $institution = trim(strip_tags($_POST['institution']));
        $phone = trim(strip_tags($_POST['phone']));
        $email = trim(strip_tags($_POST['email']));
        $date = date('Y-m-d H:i:s');
        $phoneNumber = preg_replace('~^[0\D]++|\D++~', '233', $phone);


//        if(empty($phone))
//        {
//            $error[] = 'Please enter phone number !';
//        }
//
//	 if (!preg_match("[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$", $phone))
//
//	{
//	    $error[] = 'Phone number not valid!';
//
//		}
//
//
//        if (strlen($phone) > 15 )
//        {
//            $error[] = 'Phone number must not exceed 15 numbers!';
//        }
        $message = '<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
 <title>Codesec Solutions | Registration App</title>
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

      <table>
 <tr>
   <td>
   <h3>Hello ' . $name . ',</h3><br><br>
   <p>
Thanks for registering for the Commonwealth Youth Senior Officials Meeting for the Africa Region
<br>
<a style="color:#fff;background-color:#3869d4;border-top:10px solid #3869d4;border-right:18px solid #3869d4;border-bottom:10px solid #3869d4;border-left:18px solid #3869d4;display:inline-block;text-decoration:none;border-radius:3px;box-sizing:border-box" 
href="" target="_blank" >Download Programme</a>
    </p>
   </td>
 </tr>
</table>
    </div>  
</body>
</html>';

//        if ($purpose === "Participation"){
        $row = $conn->query("SELECT * from register WHERE fullname =  '" . $name . "' AND  phone_number= '" . $phone . "'");
        $row->setFetchMode(PDO::FETCH_ASSOC);
        $user_count = $row->rowCount();

        if ($user_count == 1) {
//                echo json_encode(array($duplicate_error));
            echo 'You have registered already';
        } else {

            if ($user_count != 1 && $name != '') {
                $code = rand(0, 100000);
                $stmt = $conn->prepare("INSERT INTO register(fullname,institution,phone_number,email,date_registered) VALUES(:fullname,:institution,:phone_number,:email,:date_registered)");
                $stmt->execute(array("fullname" => $name,
                    "institution" => $institution,
                    "phone_number" => $phone,
                    "email" => $email,
                    "date_registered" => $date
                ));

                sendSMS($phoneNumber, 'Thanks for registering for the Commonwealth Youth Senior Officials Meeting for the Africa Region. Click  to access the program. Powered by CodeSec', 'NYA');
//                    echo json_encode(array($success));

                $mail = new PHPMailer();

                $senderMail = "codesec.regapp@gmail.com";
                $pwd = "badger761676";

                //   try {
                $mail->IsSMTP();

                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls'; //tls or ssl
//                 $mail->Host = "ssl://smtp.googlemail.com"; //smtp host address
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587; //host port -- port: 465 if you using SSL

                $mail->Username = $senderMail; //username or email
                $mail->Password = $pwd; //password

                $mail->setFrom($senderMail, 'Commonwealth Youth Senior Officials Meeting for the Africa Region');
                $mail->addAddress($email);
                $mail->addReplyTo('codesecsolutionsgh@gmail.com');

                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = "Commonwealth Youth Senior Officials Meeting for the Africa Region";

                $mail->Body = $message;
                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Registration Successful';
                }
            } else {
                echo 'Registration failed';
            }

        }


//        }


    }
} else {
    echo('Bad Request !');
}
function sendSMS($number, $message, $sender)
{
    http://api.rmlconnect.net/bulksms/bulksms?username=talkgh&password=pQcLOMlI&destination=233506592851&source=oteng&message=test message&type=0&dlr=1
    $http = 'http://api.rmlconnect.net/bulksms/bulksms?username=talkgh&password=pQcLOMlI&destination=' . ltrim($number, 0) . '&source=' . urlencode($sender) . '&message=' . urlencode($message) . '&type=0&dlr=1';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $http);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);

    $response = curl_exec($ch);
    curl_close($ch);
}


//function sendSMS($number, $message, $sender){
//
//    $http = 'https://api.talkgh.com/api/$2b$10$I2KwnzHEr_xKA3b5DjoBe/?des='.ltrim($number,0).'&sender='.urlencode($sender).'&mess='.urlencode($message);
//
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $http);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_VERBOSE, 1);
//    curl_setopt($ch, CURLOPT_HEADER, 1);
//
//    $response= curl_exec($ch);
//    curl_close($ch);
//
////    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
////    $header = substr($response, 0, $header_size);
////    $body = substr($response, $header_size);
////
////    return $response;
//
//}

//function random_code($length)
//{
//    return strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length));
//}
?>