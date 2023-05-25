<?php
require "../fonction.php";
require "../header.php";

if (isset($_GET['id']))
{
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Merci!</h4>
        <p>Votre compte a bien été enregistré vous pouvez maintenant vous connecter.</p>
    </div>
<?php
}

if (isset($_GET['id'])&& isset($_GET['Get']))
{
    $recette_id=$_GET['id'];
    $Get=$_GET['Get'];
}

if (!empty ($_POST['email']) && !empty ( $_POST['password']) ) 
{
    $options = [
        'cost' => 8,
    ];
    password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

    if (password_verify($_POST['password'],getmdp($_POST['email'])) )
    {
        
        $_SESSION['email']= $_POST['email'];
        $_SESSION['Pseudo']= getpseudo($_POST['email']);
        $_SESSION['Ville']= getville($_SESSION['email']);
        $mail = $_SESSION['email'];
        $_SESSION['Age']= getage($mail);
        $date=date("Y-m-d H:i:s");
        $_SESSION['Moderateur']=getModerateur($_SESSION['email']);
        lastConnexion($date,$mail);
        if (isset($_GET['id']))
        {
            header('Location: http://localhost/Blog/Blog/recette.php?id='.$recette_id.'&Get='.$Get);
        }
        else 
        {
            header('Location: http://localhost/Blog/Blog/src/pages/index.php');
        }
    }
    else 
    {
        echo 'email ou mot de passe erroné';
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Connexion</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="../assets/img/favicon.png" rel="icon">
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="../assets/css/style.css" rel="stylesheet">

        <!-- =======================================================
        * Template Name: TheEvent
        * Updated: Mar 10 2023 with Bootstrap v5.2.3
        * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>
    <body>
        <section id="contact" class="section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Connexion</h2>
                </div>
                <div class="form">
                    <form action="connexion.php" method="post" role="form" class="php-email-form">
                        <div class="form-group mt-3">
                            <input class="form-control" type="email" name="email" rows="5" placeholder="VotreMail@mail.com" required></input>
                        </div>
                        <div class="form-group mt-3">
                            <input class="form-control" type= "password" name="password" rows="5" placeholder="mot de passe" required></input>
                        </div>
                        <div class="my-3">
                        <div class="loading">Chargement</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Vos étapes ont bien été envoyé merci!</div>
                        </div>
                        <div class="text-center"><button type="submit">Connexion</button></div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Vendor JS Files -->
        <script src="../assets/vendor/aos/aos.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
        <!-- Template Main JS File -->
        <script src="../assets/js/main.js"></script>
    </body>