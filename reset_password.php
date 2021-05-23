<?php
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
require './vendor/autoload.php';
?>
<html>
    <head>
        <title>Password Recovery using PHP and MySQL</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <h2>Forgot Password</h2>   

                    <?php
                    include('connect.php');
                    $error="";
                    // if (isset($_POST["email_address"]) && (!empty($_POST["email_address"]))) {
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                        echo "clicked"    ;                   
                        $email = $_POST["email_address"];
                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                        if (!$email) {
                            $error .="Invalid email address";
                        } else {
                            $sel_query = "SELECT * FROM `patients` WHERE email_address='" . $email . "'";
                            $results = mysqli_query($conn, $sel_query);
                            $row = mysqli_num_rows($results);
                            if ($row == "") {
                                $error .= "User Not Found";
                            }
                        }
                        if ($error == "") {
                        //     echo $error;
                        // } else {

                            $output = '';

                            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
                            $expDate = date("Y-m-d H:i:s", $expFormat);
                            $key = md5(time());
                            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                            $key = $key . $addKey;
                            // Insert Temp Table
                            mysqli_query($conn, "INSERT INTO `password_reset_tempdb` (`email_address`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");


                            $output.='<p>Please click on the following link to reset your password.</p>';
                            //replace the site url
                            $output.='<p><a href="http://localhost:3307/qwellbeing/new_password.php?key=' . $key . '&email_address=' . $email . '&action=reset" target="_blank">http://localhost/qwellbeing/new_password.php?key=' . $key . '&email_address=' . $email . '&action=reset</a></p>';
                            $body = $output;
                            $subject = "Password Recovery";

                            $email_to = $email;


                            //autoload the PHPMailer
                            require("vendor/autoload.php");
                            $mail = new PHPMailer();
                            $mail->IsSMTP();
                            $mail->Host = "smtp.gmail.com"; // Enter your host here???????
                            $mail->SMTPAuth = true;
                            $mail->Username = "qwellbeingindia@gmail.com"; // Enter your email here
                            $mail->Password = "Qwellbeing@123"; //Enter your passwrod here
                            $mail->Port = 587;
                            $mail->SMTPSecure = 'tls';
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                            $mail->IsHTML(true);
                            $mail->SMTPDebug = 1;
                            $mail->From = "qwellbeingindia@gmail.com";
                            $mail->FromName = "qwellbeing4 creators";

                            $mail->Subject = $subject;
                            $mail->Body = $body;
                            $mail->AddAddress($email_to);
                            if (!$mail->Send()) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } else {
                                echo "An email has been sent";
                            }
                        }
                    }
                    ?>
                    <form method="POST" action="" name="reset">
                        

                        <div class="form-group">
                           <label><strong>Enter Your Email Address:</strong></label>
                            <input type="email" name="email_address" placeholder="username@email.com" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                        </div>
                    </form>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>