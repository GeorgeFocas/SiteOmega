<?php

ini_set("include_path", '/home/focan478/php:' . ini_get("include_path")  );
require('Mail.php');

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
     http_response_code(404);
	   die("No arguments Provided!");
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
$recipients = 'grfocas@gmail.com';

$headers['From']    = 'focas@focanocodigo.com';
$headers['To']      = 'grfocas@gmail.com';
$headers['Subject'] = 'Contato de ' . $name;

$body = "Nome: " . $name . "\n\nTelefone: " . $phone . "\n\nMensagem:\n\n" . $message;

$params['sendmail_path'] = '/usr/lib/sendmail';

// Create the mail object using the Mail::factory method
$mail_object = Mail::factory('sendmail', $params);

$mail_object->send($recipients, $headers, $body);

http_response_code(200);
echo "Mensagem enviada com sucesso!";
?>