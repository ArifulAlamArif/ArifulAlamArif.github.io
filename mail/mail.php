<?php
include "../mail/random.php";
function sendMailTo($uname,$to,$v_code)
{
	$subject = "Your Shopping Cart account: Verification Code !!";
 	$message ='Your verification code : '.$v_code.'<br>'.'<br>'.'<br>'.'-----------------------------------------------------------------------'.'<br>'.'DO NOT reply to this email.This email is system generated.'.'<br>'.'
Shopping Cart Software Division automated email service.'.'<br>'.'<br>'.'This is an automatically generated email. Please do not reply to this message.';

	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';

	$headers[] = 'To: '.$uname.' <'.$to.'>';
	$headers[] = 'From: Shopping Cart <247shoppingcart@gmail.com>';

	if(mail($to, $subject, $message, implode("\r\n", $headers)))
	{
		return true;
	}
	else
	{
		return false;
	}
}
//sendMailTo("asd","kingstonezoan@gmail.com","12as21");

?>