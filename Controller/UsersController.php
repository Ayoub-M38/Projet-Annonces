<?php

require_once '../Model/Registration.php';
require_once '../Model/Users.php';
require_once '../Model/Admin.php';



//Send email to user
function sendEmail(){
    //instance the class email
    $email = new Registration();
    return $email->confirmRegistration();
}


// login function
function login(){
    $login = new Users();
    $connexion =  $login->userLogin();
}


// send email

function contactBuyer(){
    $contact = new Admin();
    $contact_buyer = $contact->userById($_GET['id']);
    require_once '../View/contact_vendeur.php';
    return $contact_buyer;

}




