<?php

require_once '../Model/Registration.php';
require_once '../Model/Users.php';


//Send email to user
function sendEmail(){
    //instance the class email
    $email = new Registration();
    return $email->confirmRegitration();
}


// login function
function login(){
    $login = new Users();
    $connexion =  $login->userLogin();
}



