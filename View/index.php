<?php
session_start();
ob_start();
//require all our controllers
require_once '../Controller/ProductController.php';
require_once '../Controller/UsersController.php';
require_once '../Controller/AdminController.php';


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
} elseif
($url === "admin" && isset($_SESSION['user_connexion']) && $_SESSION['user_connexion'] === true) {
    $title = "Compte admin";
    fetchProductsByAdmin();
} elseif
($url === "table_utilisateurs" && isset($_SESSION['user_connexion']) && $_SESSION['user_connexion'] === true) {
    $title = "Gestion Utilisateurs";
    fetchUsersTable();

} elseif ($url === "details" && isset($_GET['product_id']) && $_GET['product_id'] > 0) {
    $title = 'Détails Annonce';
    productDetails();
} elseif ($url === "contact_vendeur") {
    $title = "Contacter le vendeur";
    userId($_GET['id']);
} elseif (isset($_SESSION['user_connexion']) && $_SESSION['user_connexion'] === true && $url === "supprimer_utilisateur" && isset($_GET['delete_id']) && $_GET['delete_id'] > 0) {
    deleteUserByID();
} elseif (isset($_SESSION['user_connexion']) && $_SESSION['user_connexion'] === true && $url === "supprimer_announce" && isset($_GET['delete_id']) && $_GET['delete_id'] > 0) {
    deleteAnnonce();
} elseif ($url === "recherche") {
    $title = "Recherche";
    searchByKw();

} elseif (isset($_SESSION['user_connexion']) && $_SESSION['user_connexion'] === true && $url === "ajouter_annonce") {
    $title = "Ajouter une annonce";
    require_once '../View/ajouter_annonce.php';
    $addForm = false;

    var_dump($_POST['nom_produit']);
    var_dump($_POST['description_produit']);
    var_dump($_POST['prix_produit']);
    var_dump($_POST['categorie_id']);
    var_dump($_POST['region_id']);
    var_dump($_FILES['photo_produit']);
    var_dump($_POST['id_user']);
    var_dump($_POST['date_depot']);


    if (isset($_POST['nom_produit']) && isset($_POST['description_produit']) && isset($_POST['prix_produit']) && isset($_POST['categorie_id']) && isset($_POST['region_id']) && isset($_POST['photo_produit']) && isset($_SESSION['id_user']) && isset($_POST['date_depot'])) {
        $addForm = true;
        if ($addForm) {
            addAnnonce($_POST['nom_produit'], $_POST['description_produit'], $_POST['prix_produit'], $_POST['categorie_id'], $_POST['region_id'], $_POST['photo_produit'], $_SESSION['id_user'], $_POST['date_depot']);
        } else {
            echo 'Failed';
        }
    }
}
$content = ob_get_clean();
require_once 'template.php';

