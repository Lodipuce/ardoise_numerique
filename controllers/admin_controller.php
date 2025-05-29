<?php

class AdminController {
    public static function login() {
        $login = strip_tags($_POST['login']);
        $password = strip_tags($_POST['password']);
        Admin::checkLogFields($login, $password);
        Admin::connect($login, $password);
        header('Location: ?controller=pages&action=backoffice');
    }

    public function logout() {
        session_destroy();
        header('Location: ?controller=pages&action=accueil');
    }

    public function modifierPassword() {
        $oldPwd = strip_tags($_POST['oldPwd']);
        $bddPassword = $_SESSION['password'];
        $newPwd = strip_tags($_POST['newPwd']);
        $confirmNewPwd = strip_tags($_POST['confirmNewPwd']);

        $errors = [];
        $error = Admin::checkCurrentPassword($oldPwd,$bddPassword);
        if ($error) {
            $errors[] = $error;
        }
        $error = Admin::checkPasswordConfirmation($newPwd,$confirmNewPwd);
        if ($error) {
            $errors[] = $error;
        }
        $error = Admin::checkRegex($newPwd);
        if ($error) {
            $errors[] = $error;
        }

        if (empty($errors)) {
            Admin::updatePassword($newPwd);
            $successMessage = "Le mot de passe a été mis à jour avec succès.";
            require_once('./views/pages/backoffice.php');
        } else {
            require_once('./views/pages/modifierPassword.php');
        }
        
        
    }
}