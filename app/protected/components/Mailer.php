<?php 
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require 'vendor/phpmailer/autoload.php';
// require 'vendor/phpmailer/phpmailer/phpmailer/PHPMailerAutoload.php';

class Mailer{
	
	public function send($to,$message,$file=null){		

		$mail = new PHPMailer;

		// $mail->SMTPDebug = 2;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = "smtp.gmail.com";  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'grupo.savt@gmail.com';                 // SMTP username
		$mail->Password = '.gRuP05aV7.';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->From = 'grupo.savt@gmail.com';
		$mail->FromName = 'Grupo Savt';
		$mail->addAddress($to, $to);     // Add a recipient
		// $mail->addAddress('ellen@example.com');               // Name is optional
		// $mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('carlosway89@gmail.com');
		// $mail->addBCC('bcc@example.com');
		if ($file) {
			$mail->addAttachment($file);         // Add attachments
		}
		// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $message->subject;
		$mail->Body    = $message->body;
		$mail->AltBody = $message->body;

		if(!$mail->send()) {
		    return 'Message could not be sent..Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    return 'Su Mensaje ha sido Enviado';
		}


	}
}
