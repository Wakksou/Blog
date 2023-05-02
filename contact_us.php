<?php 
require 'header.php';
require "fonction.php";
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

if (!empty ($_POST['name']) && !empty ( $_POST['email']) && !empty ( $_POST['subject']) && !empty ( $_POST['message']))
{
    $Name=$_POST['NomRecette'];
    $Email=$_POST['DescriptionRecette'];
    $Sujet=$_POST['image'];
    $Message=$_SESSION['Pseudo'];
    try 
          {
            $mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Username = 'eb0406e1e17aba';
$mail->Password = '768b72c8f07a0d';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 2525;
$mail->setFrom($Email);
$mail->addAddress('Millepate_staff');
$mail->Subject = $Sujet;
$mail->isHTML(TRUE);
$mail->Body = $Name.$Message;
$mail->AltBody = $Name.$Message;
$attachmentPath = './confirmations/yourbooking.pdf';
            if (file_exists($attachmentPath)) {
                $mail->addAttachment($attachmentPath, 'yourbooking.pdf');
            }
            if(!$mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                header ('Location: http://localhost/Blog/Blog/contact_us.php');
            } else {
                echo 'Message has been sent';
                header ('Location: http://localhost/Blog/Blog/index.php');
            }
  }
          catch(PDOException $e)
          {
              echo $e->getMessage();
          }
  }
?>
<!DOCTYPE html>

<section class="mb-4">

    <h2 class="h1-responsive font-weight-bold text-center my-4">Contactez-nous</h2>
    <p class="text-center w-responsive mx-auto mb-5">Avez-vous des questions? N’hésitez pas à nous contacter directement. Notre équipe reviendra à vous dans
        quelques heures pour vous aider.</p>

    <div class="container">

        <div class="item-center col-md-16 ">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <div class="row">

                <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control" placeholder= 'John Doe'>
                            <label for="name" class="">Votre nom</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="email" id="email" name="email" class="form-control" placeholder= 'email@mail.com'>
                            <label for="email" class="">Votre email</label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Sujet</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Votre messsage</label>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</section>
</html>