<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$to = "chris@endigodesign.com";
$subject = "Endigo Contact Form from " . $name;

mail($to,$subject,$message,$name);
echo '<div id="emailMsg">Your message has been received.</div>';
?>