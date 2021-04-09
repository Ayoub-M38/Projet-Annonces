<?php
session_start();
ob_start();
//require all our controllers
require_once '../Controller/ProductController.php';
require_once '../Controller/UsersController.php';


if (isset($_GET['url'])) {
    $url = $_GET['url'];
} else {
    $url = "accueil";

}

/**
 * Routers
 */

//routers
if ($url === '') {
    $url = "accueil";
}
if ($url === "accueil") {
    $title = "Accueil";
    fetchProducts();
    // User registration
} elseif ($url == 'register') {
    $title = "Inscription ";

    $username = '';
    $user_last_name = '';
    $user_email = '';

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $username = $_POST['username'];
        $user_last_name = $_POST['user_last_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $password_confirm = $_POST['password_confirm'];


        if (!$username) {
            $errors[] = 'Merci de remplir votre prénom';
        }
        if (!$user_last_name) {
            $errors[] = 'Merci de remplir votre nom';
        }
        if (!$user_email) {
            $errors[] = 'Merci de remplir l\'email.';
        }
        if (!$user_password) {
            $errors[] = 'Merci de remplir votre mot de passe.';
        }
        if ($_POST['user_password'] != $_POST['password_confirm']) {
            $errors[] = 'Merci de verifier vos mots de passe.';
        }


        if (empty($errors)) {

            $uplaoddir = 'C:\xampp\htdocs\annonces\images\\';
            $name = $_FILES['image']['name'];
            $_POST['image'] = 'images/' . $name;

            if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                move_uploaded_file($_FILES['image']['tmp_name'], $uplaoddir . $name);
            }
            sendEmail();

            echo '<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                      <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                          <p class="font-bold">Merci pour votre inscription</p>
                          <p class="text-sm">un email de validation vous à été envoyé, merci de validé votre inscription pour acceder à votre tableau de bord.</p>
                        </div>
                      </div>
                    </div>';

        }
    }
//get the register form
    require_once "register.php";

} elseif
($url == "connexion") {
    $title = "Connexion";
    require_once "connexion.php";
} elseif
($url === "deconnexion") {
    require_once "deconnexion.php";

} elseif
($url === "utilisateur" && isset($_SESSION['user_connexion']) && $_SESSION['user_connexion'] === true) {
    $title = "Compte Utilisateur";
    fetchProductsByUser();

} elseif ($url === "details" && isset($_GET['product_id']) && $_GET['product_id'] > 0 ){
    $title = 'Détails Annonce';
    productDetails();
}
    $content = ob_get_clean();
require_once 'template.php';

