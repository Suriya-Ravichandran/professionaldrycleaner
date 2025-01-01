<?php
// error_reporting(E_ALL);      Report all errors, warnings, notices
// ini_set('display_errors', 1);   Display errors on the screen

session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$config=require '../../workspace/smtp/config.php';

if(isset($_POST['submit'])){

    $fname=htmlspecialchars($_POST['fname']);
    $lname=htmlspecialchars($_POST['lname']);
    $email=htmlspecialchars($_POST['email']);
    $subject=htmlspecialchars($_POST['subject']);
    $message=htmlspecialchars($_POST['message']);

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $config['smtp_host'];                 //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $config['smtp_user'];                    //SMTP username
        $mail->Password   = $config['smtp_pass'];                   //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = $config['smtp_port'];                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('info@gocosys.com', 'Mailer From Professional Dry cleaners');
        $mail->addAddress('professionaldrycleaners123@gmail.com', 'Professional Dry cleaners');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New Enquiry - Professional Dry Cleaners';
        $mail->Body    = '<h2>Hello,You got a new enquiry<h2>
        <h4>Name:'.$fname.$lname.'</h4>
        <h4>Email:'.$email.'</h4>
        <h4>Subject:'.$subject.'</h4>
        <h4>Message:'.$message.'</h4>
        ';
        if($mail->send()){
            $_SESSION['Status']="For contacting Professional Dry Cleaners. We will contact you shortly.";
            header("Location:{$_SERVER["HTTP_REFERER"]}");
            exit(0);
        }
        else{
            $_SESSION['Status']="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location:{$_SERVER["HTTP_REFERER"]}");
            exit(0);
        }
        
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else{
    header('Location:../');
    exit(0);
}