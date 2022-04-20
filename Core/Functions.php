<?php

use PHPMailer\PHPMailer\PHPMailer;
use HPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

define("ROOT_URL", "http://localhost/KyNguyen/Website-ban-gio-cha/");
define("CART", "cart");
define("ADMIN_LOGIN", "adminLogin");
function Error()
{
    require_once "error.php";
}
function Redirect($controller, $action = "")
{
    $action = $action != "" ? "/$action" : "";
    return "/KyNguyen/Website-ban-gio-cha/$controller"."{$action}";
}
function RenderCSS($cssFileName)
{
    echo "<link rel='stylesheet' href='" . ROOT_URL . "Assets/css/$cssFileName.css' type='text/css'>\n";
}
function RenderJs($jsFileName)
{
    echo "<script src='" . ROOT_URL . "Assets/js/$jsFileName.js'></script>\n";
}
function ImageLink($imgFileName)
{
    return ROOT_URL . "Assets/img/$imgFileName";
}
function sendEmail($subject, $content)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = '0';                      //Enable verbose debug output
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';                                     //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dangkyqt2509@gmail.com';                     //SMTP username
        $mail->Password   = 'wxyahtgrxvdjbnky';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('dangkyqt2509@gmail.com');
        $mail->addAddress($_ENV["MAILSHOP"]);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->send();
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}