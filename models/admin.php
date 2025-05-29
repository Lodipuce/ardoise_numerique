<?php

class Admin {
    public $id_user;
    public $login;
    public $password;

    public function __construct($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }

    // Setters
    public function setLogin($login) {
        $this->login = $login;
    }
    public function setPassword($password) {
        $this->password = $password;
    }

    // Getters
    public function getLogin() {
        return $this->login;
    }
    public function getPassword() {
        return $this->password;
    }

    // Methodes
    public static function checkLogFields($login, $password) {
        if ((!isset($login) || !isset($password)) 
            || (empty($login) || empty($password))) {
            return die('Il faut un identifiant et un mot de passe pour se connecter.');
        }
    }

    public static function connect($login, $password) {
        $db = Db::getInstance();
        $query = $db->prepare('SELECT * FROM admin WHERE login = :identifiant');
        $query->execute([
            "identifiant" => $login,
        ]);
        $user = $query->fetch();

        $checkPassword = password_verify($password, $user['password']);

        if ($login === $user['login'] && $checkPassword === true) {
            $_SESSION['id_user']= $user['id_user'];
            $_SESSION['login'] = $user['login'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['admin'] = true;
        } 
        else {
            die('Login ou mot de passe incorrect.');
        }  
    }   
    
    public static function checkCurrentPassword($oldPwd,$bddPassword) {
        if (isset($_POST['oldPwd']) && !empty($_POST['oldPwd'])) {
            $checkPassword = password_verify($oldPwd, $bddPassword);
            if ($checkPassword === false) {
                return "Le mot de passe renseigné est incorrect.";
            } else {
                return null;
            }
        }    
    }

    public static function checkPasswordConfirmation($newPwd,$confirmNewPwd) {
        if ((isset($_POST['newPwd']) && !empty($_POST['newPwd'])) && (isset($_POST['confirmNewPwd']) && !empty($_POST['confirmNewPwd']))) {
            if ($newPwd != $confirmNewPwd) {
                return "Le nouveau mot de passe et sa confirmation doivent être identiques.";
            } else {
                return null;
            }
        }  
    }

    public static function checkRegex($newPwd) {
        if (isset($_POST['newPwd']) && !empty($_POST['newPwd'])) {
            $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{10,}$/";
            if (!preg_match($regex, $newPwd)) {
                return "Le mot de passe doit contenir au minimum 10 caractères dont 1 majuscule, 1 minuscule et 1 chiffre.";
            } else {
                return null;
            }
        } 
    }

    public static function updatePassword($newPwd) {
        $db = Db::getInstance();
        $password = password_hash($newPwd, PASSWORD_DEFAULT);
        $query = $db->prepare('UPDATE admin SET password = :password WHERE id_user = :id_user');
        $query->execute([
            'id_user' => $_SESSION['id_user'],
            'password' => $password,
        ]);
    }
}