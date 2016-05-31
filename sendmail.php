<?php

	// the message
//$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
//mail("grfocas@gmail.com","My subject",$msg);


echo "essa bosta funciona";
echo $_POST["name"] . $_POST["email"];
echo basename($_FILES["fileToUpload"]["name"]);

ini_set("SMTP","smtp.focanocodigo.com" ); 
ini_set('sendmail_from', 'focas@focanocodigo.com');

$Name = "George Focas"; //senders name 
$email = "focas@focanocodigo.com"; //senders e-mail adress 
$recipient = "grfocas@gmail.com"; //recipient 
$mail_body = "The text for the mail..."; //mail body 
$subject = "Subject for reviever"; //subject 
$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields 

mail($recipient, $subject, $mail_body, $header); //mail command :) 
?>