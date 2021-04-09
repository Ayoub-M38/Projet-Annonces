<?php
require_once 'Database.php';
//Import de la classe php mailer intalée depuis composer  = composer require phpmailer/phpmailer
//Le tous est dans le dossier vendor
//Appel des namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

class Registration extends Database
{
    private $username;
    private $user_last_name;
    private $user_email;
    private $user_password;
    private $image;

    public function confirmRegitration()
    {

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = '3424cf2c5a408e';                     //SMTP username
            $mail->Password = '2187232eeee7ae';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 2525;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('annonce@example.com', 'Leboncoin');
            $mail->addAddress('annonce@example.net', 'Joe User');     //Add a recipient
            $mail->addReplyTo('info@example.com', 'Information');


            //connexion to PDO
            $db = $this->getPDO();

            // Get users from db
            $getUsers = $db->query("SELECT * FROM utilisateurs");

            // use private property's
            $this->username = $_POST['username'];
            $this->user_last_name = $_POST['user_last_name'];
            $this->user_email = $_POST['user_email'];
            $this->user_password = $_POST['user_password'];
            $this->image = $_POST['image'];



            $mail->Subject = 'Confirmation inscription';

            //Content
            $mail->isHTML(true);

            //input user into table users
            $getUsers = $db->prepare("INSERT INTO `utilisateurs`(`prenom_utilisateur`, `nom_utilisateur`, `email_utilisateur`, `password_utilisateur`, `image_utilisateur`) VALUES (?,?,?,?,?)");

            //bind Param
            $getUsers->bindParam(1, $this->username);
            $getUsers->bindParam(2, $this->user_last_name);
            $getUsers->bindParam(3, $this->user_email);
            $getUsers->bindParam(4, $this->user_password);
            $getUsers->bindParam(5, $this->image);

            //Execute query
            $getUsers->execute();
            //header('Location: accueil');

            //create a variable for redirection to the connexion page
            $redirection = "http://localhost/annonces/utilisateur";

            // email html content
            $mail->Body = '
                     <!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="Content-Type" content="text/html">
                            <title>Votre inscription sur Annonce.com</title>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        </head>
                        <body style="color: #43617f; font-size: 22px;">
                        <div style="padding: 20px;">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6fV5-gvJoErCmW1i-kzcc5C0slzboniFycw&usqp=CAU" width="75px" height="75px">
                        </div>
                        <div style="padding: 20px;">
                            <h1>Leboncoin</h1>
                            <h2>Bonjour : ' . $this->user_email . '</h2>
                            <p>Vous êtes desormais inscrit sur le site Annonce.com merci de valider votre inscription avec le liens suivant</p><br />
                            <p>Recapitulatif de vos information de connexion</p>
                            <p>Nom :<b style="color: #8b0000">' . $this->username . '</b></p>
                            <p>Email :<b style="color: #8b0000"> ' . $this->user_email . '</b></p>
                            <p>Mot de passe :<b style="color: #8b0000;">' . $this->user_password . '</p>
                            <br /><br />
                            <a href="' . $redirection . '" style="background-color: darkred; color: #F0F1F2; padding: 20px; text-decoration: none;">Confimer votre inscription sur notre site</a><br />
                            <br /><br />                      
                            <p style="color: #43617f;">Merci d\'utiliser notre site web</p>
                            <p style="color: #43617f;">Cordialement : leboncoin.com: Ayoub  : Administrateur</p>    
                        </div>
                        </body>
                        </html>
                        ';
            //Conversion de HTML5
            $mail->body = "MIME-Version: 1.0" . "\r\n";
            $mail->body .= "Content-type:text/html;charset=utf8" . "\r\n";

            $mail->send();
            //header('Refresh:3; url=connexion');
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        }

    }

}