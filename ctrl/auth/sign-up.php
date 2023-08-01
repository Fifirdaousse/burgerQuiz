<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
// require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

// use Monolog\Logger;

/** Traite le formulaire de création d'un Utilisateur. */
class SignUser extends Ctrl
{
    // /** @Override */
    // function log(): Logger
    // {
    //     return Log::getLog(__CLASS__);
    // }

    /** @Override */
    function isRequiredUserLogged()
    {
        return false;
    }

    /** @Override */
    function getPageTitle()
    {
        return 'S\'inscrire';
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
        header('Location: /ctrl/auth/sign-up-display.php');
    }

    /** @Override */
    function getView()
    {
        return null;
    }
}

$ctrl = new SignUser();
$ctrl->execute();

