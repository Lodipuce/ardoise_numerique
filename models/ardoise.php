<?php

class Ardoise {
    public $id_ardoise = null;
    public $prenom;
    public $montant;
    public $id_user = null;

    public function __construct($id_ardoise,$prenom,$montant,$id_user)
    {
        $this->id_ardoise = $id_ardoise;
        $this->prenom = $prenom;
        $this->montant = $montant;
        $this->id_user = $id_user;
    }

    // Setters
    public function setId_ardoise($id_ardoise) {
        $this->id_ardoise = $id_ardoise;
    }
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    public function setMontant($montant) {
        $this->montant = $montant;
    }
    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    // Getters
    public function getId_ardoise() {
        return $this->id_ardoise;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getMontant() {
        return $this->montant;
    }
    public function getId_user() {
        return $this->id_user;
    }


    // Methodes
    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $query = $db->prepare('SELECT * FROM ardoise');
        $query->execute();
        $ardoises = $query->fetchAll();

        foreach ($ardoises as $ardoise) {
            $list[] = new Ardoise($ardoise['id_ardoise'],$ardoise['prenom'], $ardoise['montant'],$ardoise['id_user']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $query = $query = $db->prepare('SELECT * FROM ardoise WHERE id_ardoise = :ardoise');
        $query->execute(['ardoise' => $id]);
        $ardoise = $query->fetch();

        return new Ardoise($ardoise['id_ardoise'],$ardoise['prenom'], $ardoise['montant'],$ardoise['id_user']);
    }

    public static function createArdoise($prenom,$montant) {
        $db = Db::getInstance();
        $query = $db->prepare('INSERT INTO ardoise (prenom,montant,id_user) VALUES (:prenom, :montant, :id_user)');
        $query->execute([
            'prenom' => $prenom,
            'montant' => $montant,
            'id_user' => $_SESSION['id_user'],
        ]);
    }

    public static function updateArdoise($id_ardoise,$newSum) {
        $db = Db::getInstance();
        $query = $db->prepare('UPDATE ardoise SET montant = :newAmount WHERE id_ardoise = :id_ardoise');
        $query->execute([
            'newAmount' => $newSum,
            'id_ardoise' => $id_ardoise,
        ]); 
    }

    public static function deleteArdoise($id_ardoise) {
        $db = Db::getInstance();
        $query = $db->prepare('DELETE FROM ardoise WHERE id_ardoise = :id_ardoise');
        $query->execute([
            'id_ardoise' => $id_ardoise,
        ]);
    }   
}