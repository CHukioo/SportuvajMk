<?php


error_log("vlegov na stranata".PHP_EOL, 3, "logs\log.log");

require_once 'PHPMailer-master\PHPMailerAutoload.php';
require_once "recaptchalib.php";
$secret = "6LdDSw0UAAAAAMzAfICzoKedgQKYv109K4zM_9Mc";
$response = null;
$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($response != null && $response->success) {
    register();
  } else {
  	header('Location: login.php?tocno=5');
  }

function register() {
	error_log("vlegov vo register".PHP_EOL, 3, "logs\log.log");
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$code = md5($username);


		$conn = mysql_connect("localhost", "root", "root");

		$sql = "INSERT INTO login_user (username, password, name, verify)
		VALUES ('".$username."', '".$password."', '".$name."','".$code."')";

		$sql2 = "SELECT username FROM login_user WHERE username='".$username."'";

		      
		mysql_select_db('sportuvaj_mk');
		$brojac = mysql_query($sql2, $conn);
		$broj = mysql_num_rows($brojac);

		if ($broj == 0) {
			$retval = mysql_query( $sql, $conn );
		   
			if(! $retval ) {
				header('Location: login.php?tocno=3');
			}
			header('Location: login.php?tocno=2');
			error_log("uspesna registracija".PHP_EOL, 3, "logs\log.log");
			sendMail($username,$name);
							
		}
		else{
			header('Location: login.php?tocno=4');
		}   
		mysql_close($conn);
}

function sendMail($username,$name){
	$mail = new PHPMailer;

	error_log("vlegov vo send mail".PHP_EOL, 3, "logs\log.log");

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp-pulse.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'markocurlinoski.uie@gmail.com';                 // SMTP username
$mail->Password = 'm3E7MQYpRR';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('markocurlinoski.uie@gmail.com', 'no-replay@sportuvaj.mk');
$mail->addAddress($username);              // Add a recipient     // Name is optional
$mail->addReplyTo('markocurlinoski.uie@gmail.com', 'Information');

$mail->isHTML(true);     // Set email format to HTML

$verify = md5($username);

$poraka= '';  

$mail->Subject = 'Registration Confrimation';
$mail->Body    = '<!DOCTYPE html> <html> <head> <title>Емаил за верификација</title> <style type="text/css"> .container{ width: 60%; margin: 0 auto; border-width: 2px; border-color: #007bff; border-style: solid; border-radius: 5px; padding: 30px; color: white; background-color: #007bff; font-family: "Oswald", sans-serif;padding-top: 10px; padding-bottom: 15px; } h2{ text-align: center; } .kopce{ background-color: #004EA3; color: white; padding: 5px; text-decoration: none; border-style: solid; border-color: #004EA3; border-radius: 5px; text-align: center; } .potvrda{ width: 100%; text-align: center; } .link{ color: #004EA3; text-decoration: none; } @media screen and (max-width: 640px){ .container{ width: 85%; } } </style> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> </head> <body> <div class="container"> <h2>Верификување на емаил</h2> <p>Здраво '.$name.',</p> <p>Добредојде на нашата страна <a href="" class="link">sportuvaj.mk</a>. Од вашата емаил адреса е извшрено регистрирање. Ве молиме потврдете ја истата. Доколку вие лично не сте се регистрирале ве молиме игнорирајте го овој маил.</p> <p>Поздрав,<br> Тимот на <a href="" class="link">sportuvaj.mk</a></p> <div class="potvrda"> <a href="http://localhost/sportuvajMk/confirm.php?verify='.$verify.'" class="kopce">ПОТВРДИ</a> </div> <p class="lead text-center text-white" style="text-align:center;">© Copyright 2017 <a href="" class="link">sportuvaj.mk</a> - Сите права задржани.</p> </div> </body> </html>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    //echo 'Message could not be sent.';
	    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	    error_log("porkata ne e pratena".PHP_EOL, 3, "logs\log.log");
	} else {
	    //echo 'Message has been sent';
	    error_log("porkata pratena".PHP_EOL, 3, "logs\log.log");
	}
}
?>