<?php 
require 'header.php';
require "fonction.php";
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
            </form>

            <div class="text-center text-md-left">
                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
            </div>
            <div class="status"></div>
        </div>
    </div>
</section>
</html>