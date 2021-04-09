<?php
require_once 'Database.php';


class Users extends Database
{
    private $user_id;
    private $user_email;
    private $user_password;
    private $image;
    private $username;
    private $lastname;

    // Method user login
    public function userLogin()
    {
        //PDO connexion
        $db = $this->getPDO();
        $this->user_email = $_POST['user_email'];
        $this->user_password = $_POST['user_password'];


        //Sql query
        $sql = "SELECT * FROM utilisateurs WHERE email_utilisateur = ? AND password_utilisateur = ?";

        //query preparation
        $stmt = $db->prepare($sql);
        //bind our params
        $stmt->bindParam(1, $this->user_email);
        $stmt->bindParam(2,$this->user_password );
        //execute query
        $stmt->execute();

        if($stmt->rowCount() >= 1){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->user_id = $row['id_utilisateur'];
            $this->user_email = $row['email_utilisateur'];
            $this->user_password = $row['password_utilisateur'];
            $this->image = $row['image_utilisateur'];
            $this->username = $row['prenom_utilisateur'];
            $this->lastname = $row['nom_utilisateur'];

            if($this->user_email == $row['email_utilisateur'] && $this->user_password == $row['password_utilisateur'] && $this->image == $row['image_utilisateur'] && $this->username == $row['prenom_utilisateur'] && $this->lastname == $row['nom_utilisateur']){
                //start our session
                //session_start();
                $_SESSION['user_connexion'] = true;
                $_SESSION['id_user'] = $this->user_id;
                $_SESSION['email_user'] = $this->user_email;
                $_SESSION['image'] = $this->image;
                $_SESSION['username'] = $this->username;
                $_SESSION['lastname'] = $this->lastname;
                header('Location: http://localhost/annonces/utilisateur');
                var_dump($_SESSION['email_user']);
                var_dump($_SESSION['id_user']);
                var_dump($_SESSION['image']);
                var_dump($_SESSION['username']);
                echo 'you are connected';
            }else{
                echo '<div role="alert">
              <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Erreur !
              </div>
              <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>Merci de vérifié votre email et mot de passe</p>
              </div>
            </div>';
            }
        }else{
            echo '<div role="alert">
              <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Erreur !
              </div>
              <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>Aucun utilisateur ne possèdent cet email et mot de passe</p>
              </div>
            </div>';
        }


    }
}