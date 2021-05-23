<?php
$receiver = "msshetty237@gmail.com";
$subject = "TESTING PHP ";
$body = "Hi, there...This is a test email send from Localhost.";
$sender = "From:qwellbeingindia@gmail.com";

if(mail($receiver, $subject, $body, $sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?>