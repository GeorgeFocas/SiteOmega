<?php

ini_set("include_path", '/home/focan478/php:' . ini_get("include_path")  );
ini_set("SMTP","smtp.focanocodigo.com" ); 
ini_set('sendmail_from', 'focas@focanocodigo.com');

require('Mail.php');
require('Mail/mime.php');
require('utils.php');



if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	  http_response_code(404);
  	  die("No arguments Provided!");
   }


$applicantName = $_POST['name'];
$applicantEmail = $_POST['email'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$fileUtils = new FileUtils();


if ($fileUtils->fileExtensionIsValid($target_file) == false)
{
	http_response_code(400);
  	die("Arquivo invalido. Favor enviar arquivos do word ou pdf.");
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) == false) 
{
    http_response_code(500);
  	die("Erro ao realizar upload");
}


$mimeType = mime_content_type ($target_file);

$mime = new Mail_mime("\n");

$mime->setTXTBody('Recebido curriculo de ' . $applicantName . ". Email de contato: " . $applicantEmail);
$mime->addAttachment($target_file, $mimeType);

$recipients = 'grfocas@gmail.com,michelly.geovanna2013@gmail.com';

$headers['From']    = 'focas@focanocodigo.com';
$headers['To']      = 'grfocas@gmail.com';
$headers['Subject'] = 'Curriculo de ' . $applicantName;

$body = $mime->get();
$hdrs = $mime->headers($headers);

$params['sendmail_path'] = '/usr/lib/sendmail';

// Create the mail object using the Mail::factory method
$mail_object = Mail::factory('sendmail', $params);

$mail_object->send($recipients, $hdrs, $body);

unlink($target_file);

http_response_code(200);
echo "Curriculo enviado com sucesso!";
?>