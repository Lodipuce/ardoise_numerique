<?php

function call($controller, $action) {
    require_once 'controllers/'.$controller.'_controller.php';
    
    switch($controller) {
        case 'pages':
            require_once('models/ardoise.php');
            $controller = new PagesController();
        break;
        case 'admin':
            require_once('models/admin.php');
            $controller = new AdminController();
    }

    $controller->{$action}();
}

$controllers = array('pages' => ['accueil','backoffice','connection','formCreationArdoise','creerArdoise','formModifArdoise','modifierArdoise','supprimerArdoise','formModifPassword','error'],
                    'admin' => ['login','logout','modifierPassword']);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages','error');
    }
} else {
    call('pages','error');
}