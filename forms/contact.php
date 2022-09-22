<?php
use PHPMailer\PHPMailer\PhpMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
$yahoo_mail = new PHPMailer(true);
 
$yahoo_mail->IsSMTP();
// Send email using Yahoo SMTP server
$yahoo_mail->Host = 'smtp.mail.yahoo.com';
// port for Send email
$yahoo_mail->Port = 465;
$yahoo_mail->SMTPSecure = 'ssl';
//$yahoo_mail->SMTPDebug = 1;
$yahoo_mail->SMTPAuth = true;
$yahoo_mail->Username = 'halconnhadley@yahoo.com';
$yahoo_mail->Password = 'jdbkssaiozsagxms';


//$yahoo_mail->addReplyTo('brenthaven.nhadley@gmail.com');  // Name is optional
$yahoo_mail->From = 'halconnhadley@yahoo.com';
$yahoo_mail->FromName = $_POST['name'];// frome name
//$yahoo_mail->AddAddress('brenthaven.nhadley@gmail.com', 'brent');  // Add a recipient  to name
$yahoo_mail->AddAddress($_POST['email']);  // Name is optional
$yahoo_mail->AddReplyTo('halconnhadley@yahoo.com');

$yahoo_mail->IsHTML(true); // Set email format to HTML
 
$yahoo_mail->Subject = $_POST['subject'];
$yahoo_mail->Body    = $_POST['message'];
//$yahoo_mail->AltBody = 'This is the body in plain text for non-HTML mail clients at https://onlinecode.org/';
 

if(!$yahoo_mail->Send()) {
  echo 'Message could not be sent.';
echo 'Mailer Error: ' . $yahoo_mail->ErrorInfo;
exit;
}
else
{
  echo "OK";
}
?>