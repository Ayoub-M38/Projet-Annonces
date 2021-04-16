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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // add announce

    public function addAnnonce($nom_produit, $description_produit, $date_depot, $prix_produit, $photo_produit, $categorie_id, $utilisateur_id, $region_id)
    {
        $db = $this->getPDO();
        //property's
        $this->nom_produit = $nom_produit;
        $this->description_produit = $description_produit;
        $this->prix_produit = $prix_produit;
        $this->photo_produit = $photo_produit;
        $this->categorie_id = $categorie_id;
        $this->utilisateur_id = $utilisateur_id;
        $this->region_id = $region_id;
        $this->date_depot;

        //sql query

        $sql = "INSERT INTO `annonces`(`nom_produit`, `description_produit`, `prix_produit`, `photo_produit`, `categorie_id`, `utilisateur_id`, `region_id`, `date_depot`) VALUES (?,?,?,?,?,?,?,?)";

        $stmt = $db->prepare($sql);

        //bind params
        $stmt->bindParam(1, $nom_produit);
        $stmt->bindParam(2, $description_produit);
        $stmt->bindParam(3, $prix_produit);
        $stmt->bindParam(4, $photo_produit);
        $stmt->bindParam(5, $categorie_id);
        $stmt->bindParam(6, $utilisateur_id);
        $stmt->bindParam(7, $region_id);
        $stmt->bindParam(8, $date_depot);

        $stmt->execute(array(
            $nom_produit,
            $description_produit,
            $prix_produit,
            $photo_produit,
            $categorie_id,
            $utilisateur_id,
            $region_id,
            $date_depot
        ));

        return $stmt;

    }

    public function getCategories()
    {
        $db = $this->getPDO();
        $sql = "SELECT * FROM categories";
        $categories = $db->query($sql);
        return $categories;
    }

    public function getRegions()
    {
        $db = $this->getPDO();
        $sql = "SELECT * FROM regions";
        $regions = $db->query($sql);
        return $regions;
    }

    public function searchAnnonce()
    {
        $db = $this->getPDO();

        if (isset($_POST['search'])) {
            $search = $_POST['search'];
        } else {
            $search = '';
            if (empty($search)) {

            }
        }
        if (!empty($search)) {
            $sql = "SELECT * FROM annonces WHERE nom_produit LIKE '%$search%'";
            return $db->query($sql);
        }

    }

}