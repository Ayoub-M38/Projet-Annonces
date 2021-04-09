<?php

require_once '../Model/Products.php';
require_once '../Model/Users.php';


function fetchProducts(){
    $products = new Products();
    $results = $products->getProducts();
    require_once '../View/accueil.php';
}

function fetchProductsByUser()
{
    $userProducts = new Products();
    $rows = $userProducts->getProductsByUser();
    require_once '../View/utilisateur.php';

}

function productDetails()
{
    $annonce = new Products();
    $details = $annonce->getDetails();
    require_once '../View/details.php';
}