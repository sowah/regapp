<?php
$ToEmail = 'abc@gmail.com';
$EmailSubject = 'User Contact Information';
	$mailheader = "From: ".$_POST["email"]."\r\n";
		$mailheader .= "Reply-To: ".$_POST["email"]."\r\n";
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
$data=[
	'email' => $_POST['email']
];
$MESSAGE_BODY=file_get_contents('subscription_form.html');

//replace [_[variable]_] with value
foreach ($data as $key => $value) {
	$MESSAGE_BODY=str_replace('[_['.$key.']_]',$value,$MESSAGE_BODY);
}

mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure");
?>