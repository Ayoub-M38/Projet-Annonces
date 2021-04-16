<?php

require_once '../Model/Products.php';
require_once '../Model/Users.php';


function fetchProducts()
{
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


    function fetchProductsByAdmin()
    {
        $userProducts = new Products();
        $rows = $userProducts->getProducts();
        require_once '../View/admin.php';
    }

    function addAnnonce($nom_produit, $description_produit, $prix_produit, $photo_produit, $categorie_id, $utilisateur_id, $region_id, $date_depot)
    {
        $annonce = new Products();
        $addAnnonce = $annonce->addAnnonce($nom_produit, $description_produit, $prix_produit, $photo_produit, $categorie_id, $utilisateur_id, $region_id, $date_depot);
        if ($addAnnonce) {
            header('Refresh:2; http://localhost/annonces/utilisateur');
            echo '<div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
  <p>Votre annonce à bien été ajouté</p>
</div>';
        } else {
            echo "<div class='flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3' role='alert'>
  <svg class='fill-current w-4 h-4 mr-2' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><path d='M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z'/></svg>
  <p>Une erreur est survenue durant l'ajout de votre annonce merci de réessayé !</p>
</div>";
        }
    }

// fetch categories

function fetchCategories(){
$categories = new Products();
$fetchCategories = $categories->getCategories();
?>
<option>Catégories </option>
<?php
foreach ($fetchCategories as $row):
?>
<option value="<?= $row['id_categorie'] ?>"><?= $row['type_categorie'] ?></option>
<?php
endforeach;
return $fetchCategories;
}

function fetchRegions(){
$regions = new Products();
$fetchRegions = $regions->getRegions();
?>
<option>Régions </option>
<?php
foreach ($fetchRegions as $row):
?>
<option value="<?= $row['id_region'] ?>"><?= $row['nom_region'] ?></option>
<?php
endforeach;
return $fetchRegions;
}

function searchByKw(){
    $annonce = new Products();
    $search = $annonce->searchAnnonce();
    if($search){
        require_once "../View/recherche.php";
    }else{
        echo 'failed';
    }



}

