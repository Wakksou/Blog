<?php
namespace App\classes;
use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
require_once '../../vendor/autoload.php';

///Chargement des variables d'environnement 
$dotenv = Dotenv::createImmutable("../../");
$dotenv->safeLoad();
class Mail 
{
    private $mail;

    public function __construct()
    {

        ///$this-> fait reference a l'attribut de la classe      
        //Création d'un objet PHPMailer
        //$mail de la classe Mail deviens un objet phpMailer
        $this->mail = new PHPMailer();

        //mail deviens un objet phpMailer donc il reprend les attribut de la classe phpMailer
        ///Configuration du serveur SMTP
        $this->mail->isSMTP();
        $this->mail->Host = 'sandbox.smtp.mailtrap.io';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $_ENV['MAILTRAP_USERNAME'];
        $this->mail->Password = $_ENV['MAILTRAP_PASSWORD'];
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 2525;
    }

    public function sendContactUs($from, $to, $nom) : bool
    {
        $this->mail->setFrom($to);
        $this->mail->addAddress($from);
        $this->mail->Subject = "Confirmation de votre demande de contact";
        $this->mail->isHTML(TRUE);
        $this->mail->Body = "Bonjour ".$nom." nous avons bien recus votre mail";
        $this->mail->AltBody = "";
        // send the message
        return $this->mail->send();
    }
}
?>