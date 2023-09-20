<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;

/** Affiche le formualire de signup. */
class SignUser extends Ctrl
{
    // /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function isRequiredUserLogged()
    {
        return false;
    }

    /** @Override */
    function getPageTitle()
    {
        return null;
    }
    /** @Override */
    function getDescription()
    {
        return null;
    }

    /** @Override */
    function do()
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        // Créé l'Utilisateur
        LibUser::signup($nom, $prenom, $email, $mdp);

        // Redirige l'Utilisateur vers la liste des Utilisateurs
        header('Location: /ctrl/auth/login-display.php');
    }

    /** @Override */
    function getView()
    {
        return null;
    }
}

$ctrl = new SignUser();
$ctrl->execute();
