<?php 
function gui_mail($mail_nhan,$body){
	require 'config/mailler/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	$mail->isSMTP();     
	$mail->CharSet = 'UTF-8';                               // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'luongitbkap@gmail.com';                 // SMTP username
$mail->Password = 'luongitbkap!%@$';                             // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // 465 TCP port to connect to

	$mail->From = 'c1807iiibkap@gmail.com';
$mail->FromName = 'Shopping Online Demo';
$mail->addAddress('c1807iiibkap@gmail.com', 'Tên người nhận');    
	 //Add a recipient
$mail->addAddress('vuminhdat.nd01@gmail.com');               // Add a recipient
	$mail->addAddress($mail_nhan);               // Name is optional
	// $mail->addReplyTo('info@example.com', 'Information');
	// $mail->addCC('cc@example.com');
	// $mail->addBCC('bcc@example.com');
	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Đây là mail đặt hàng';
	$mail->Body    = $body;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	   return false;
	} else {
	    return true;
	}
}

 ?>