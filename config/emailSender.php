<?php

    // PHP Mailer Configurations
    define("MAILER_HOST", "smtp.gmail.com");
    define("MAILER_NAME", "Instambay FoodHub Admin");
    define("MAILER_USERNAME", "zyle.dulana.ui@phinmaed.com");
    define("MAILER_PASSWORD", "ltip cdrt ifop kulo");
    define("MAILER_PORT", 587);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";


    function sendResetPasswordLink($email, $full_name, $link) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = MAILER_HOST;

            $mail->Username = MAILER_USERNAME;
            $mail->Password = MAILER_PASSWORD;
            $mail->SMTPSecure = "tls";
            $mail->Port = MAILER_PORT;

            $mail->setFrom(MAILER_USERNAME, MAILER_NAME);
            $mail->addAddress($email, $full_name);

            $mail->isHTML(true);
            $mail->Subject = "Instambay FoodHub: Request Password Reset";
            $mail->Body = "
                Greetings, <b>$full_name</b>! <br><br>

                We received a request to reset the password for your <b>Instambay</b> account. 
                To continue, please click the link below to create a new password:<br><br>

                Click here to reset your password: <br>
                <a href='$link' target='_blank'><b>Reset My Password</b></a><br><br>

                After opening the link, follow these steps:<br>
                1. Enter your <b>New Password</b>.<br>
                2. Confirm your <b>New Password</b>.<br>
                3. Click <b>Reset Password</b> to finish the process.<br><br>

                <b>Important:</b><br>
                • This password reset link will expire in <b>5 minutes</b> for security reasons.<br>
                • If you did not request a password reset, please ignore this email.<br><br>

                Regards, <br>
                <b>Instambay FoodHub Admin</b>
            ";

            $mail->send();

            return ["success" => true, "message" => "Email sent successfully."];
        } 
        
        catch (Exception $e) {
            error_log("Error: " . $mail->ErrorInfo);
            return ["success" => false, "message" => "Error in sending email! Please try again."];
        }
    }
    
?>