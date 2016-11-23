<?php
$to = "eng.a7med.ma7er@gmail.com";
$subject = "سوق ماب";
$message = "Hello! This is a simple email message.";
$from = "dalilaqa@phx10.stablehost.com";
$headers = "From: سوق ماب <" . $from."> ";
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>
