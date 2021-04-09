<?php
require_once 'Database.php';

class Products extends Database
{
    private $id_annonce;
    private $nom_produit;
    private $description_produit;
    private $prix_produit;
    private $photo_produit;
    private $date_depot;
    private $categorie_id;
    private $utilisateur_id;
    private $region_id;


    public function getProducts()
    {
        $db = $this->getPDO();
        $sql = "SELECT * FROM annonces INNER JOIN utilisateurs ON annonces.utilisateur_id = utilisateurs.id_utilisateur INNER JOIN categories ON annonces.categorie_id = categories.id_categorie INNER JOIN regions ON annonces.region_id = regions.id_region";

        return $db->query($sql);
    }

    public function getProductsByUser()
    {
        //PDO connexion
        $db = $this->getPDO();
        //mysql query
        $sql = "SELECT * FROM annonces INNER JOIN utilisateurs ON annonces.utilisateur_id = utilisateurs.id_utilisateur INNER JOIN categories ON annonces.categorie_id = categories.id_categorie INNER JOIN regions ON annonces.region_id = regions.id_region WHERE utilisateur_id = ?";
        //get user ID
        $this->utilisateur_id = $_SESSION['id_user'];

        $query = $db->prepare($sql);

        $query->bindParam(1, $this->utilisateur_id);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);


    }

    public function getDetails()
    {
        $db = $this->getPDO();
        $sql = "SELECT * FROM annonces INNER JOIN utilisateurs ON annonces.utilisateur_id = utilisateurs.id_utilisateur INNER JOIN categories ON annonces.categorie_id = categories.id_categorie INNER JOIN regions ON annonces.region_id = regions.id_region WHERE id_produit = ?";

        // get product id
        $this->id_annonce = $_GET['product_id'];
        // sql query
        $stmt = $db->prepare($sql);
        // bind params
        $stmt->bindParam(1, $this->id_annonce);
        // execute query
        $stmt->execute();
        //return the results
        $details = $stmt->fetch(PDO::FETCH_ASSOC);
        return $details;
    }
}