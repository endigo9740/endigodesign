<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$to = "chris@endigodesign.com";
$subject = "Endigo Contact Form from " . $name;

if(isset($name) && isset($email) && isset($message)){
	mail($to,$subject,$message,$name);
	echo '<div id="emailMsg">Your message has been received.</div>';
} else {
	echo '<div id="emailMsg">Failed to deliver message. Missing name, email or comment.</div>';
}

?>