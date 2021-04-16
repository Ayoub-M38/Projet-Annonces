<?php

require_once 'Database.php';

class Admin extends Database
{
    private $id_produit;
    private $nom_produit;
    private $description_produit;
    private $prix_produit;
    private $photo_produit;
    private $date_depot;
    private $id_categorie;
    private $id_utilisateur;
    private $region_id;


    // Method fetch table users
    public function fetchAllUsers()
    {
        $db = $this->getPDO();
        $sql = "SELECT * FROM utilisateurs";
        $users = $db->query($sql);
        return $users;
    }

    // Method fetch user by id
    public function userById($id){
        $db = $this->getPDO();
        $sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = ?";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute(array($id));
        $user_id = $stmt->fetch();
        return $user_id;
    }

    // delete user

    public function deleteUser()
    {
        $db = $this->getPDO();
        $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = ?";
        $stmt = $db->prepare($sql);
        $this->id_utilisateur = $_GET['delete_id'];
        $stmt->bindParam(1, $this->id_utilisateur);
        $delete = $stmt->execute();
        return $delete;
    }

    // delete announce
    public function deleteProduct()
    {
        $db = $this->getPDO();
        $sql = "DELETE FROM `annonces` WHERE `id_produit` = ? ";
        $stmt = $db->prepare($sql);
        $this->id_produit = $_GET['delete_id'];
        $stmt->bindParam(1, $this->id_produit);
        return $stmt->execute();
    }
}