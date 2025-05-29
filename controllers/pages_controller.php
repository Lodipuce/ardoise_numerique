<?php

class PagesController
{
    public function accueil()
    {
        $ardoises = Ardoise::all();
        require_once('./views/pages/accueil.php'); 
    }

    public function backoffice()
    {
        $ardoises = Ardoise::all();
        require_once('./views/pages/backoffice.php');
    }

    public function connection()
    {
        require_once('./views/pages/connection.php');
    }   

    public function formCreationArdoise()
    {
        require_once('./views/pages/creerArdoise.php');
    }

    public function creerArdoise() {
        try {
            $prenom = strip_tags($_POST['prenom']);
            $montant = strip_tags($_POST['montant']);
            Ardoise::createArdoise($prenom,$montant);
            require_once('./views/pages/backoffice.php');
        } catch (Exception) {
            require_once('./views/pages/errorArdoiseCreation.php');
        }    
    }

    public function formModifArdoise()
    {
        require_once('./views/pages/modifierArdoise.php');
    }

    public function modifierArdoise() {
        $id_ardoise = $_POST['id_ardoise'];
        $newSum = strip_tags($_POST['newSum']);
        Ardoise::updateArdoise($id_ardoise,$newSum);
        require_once('./views/pages/backoffice.php');
    }

    public static function supprimerArdoise() {
        try {
            $id_ardoise = $_GET['id_ardoise'];
            Ardoise::deleteArdoise($id_ardoise);
            $successMessage = "L'ardoise a bien été supprimée.";
            require_once('./views/pages/backoffice.php');
        } catch (Exception) {
            require_once('./views/pages/error.php');
        }
        
    }

    public function formModifPassword()
    {
        require_once('./views/pages/modifierPassword.php');
    }

    public function error()
    {
        require_once('./views/pages/error.php');
    }
}


