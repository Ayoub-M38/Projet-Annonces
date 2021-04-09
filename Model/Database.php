<?php


class Database
{
    private $host = 'localhost';
    private $db_name = 'leboncoin';
    private $user = 'root';
    private $password = '';

    protected $connexion;

    public function getPDO(){
        $this->connexion = null;
        if($this->connexion === null){
            try{
                $this->connexion = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name.";charset=utf8",$this->user,$this->password);
                $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo 'connexion success';
                return $this->connexion;

            }catch(PDOException $exception){
                echo 'Erreur de connexion';
                die();
            }
        }
    }
}