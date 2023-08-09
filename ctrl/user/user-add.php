<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
// require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

// use Monolog\Logger;

/** Traite le formulaire de création d'un Utilisateur. */
class AddUser extends Ctrl
{
    /** @Override */
    // function log(): Logger
    // {
    //     return Log::getLog(__CLASS__);
    // }

    /** @Override */
    function isRequiredUserLogged()
    {
        return true;
    }

    /** @Override */
    function getPageTitle()
    {
        return null;
    }

    /** @Override */
    function getDescription()
    {
        return 'Ajouter un nouvel utilisateur et définir son rôle';
    }

    /** @Override */
    function do()
    {
        // lit les données saisies dans le formulire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $valeur = $_POST['role'];

        if($valeur == "gestionnaire"){
            $idRole = 10;
        }else{
            $idRole = 20;
        }

        // Créé l'Utilisateur
        LibUser::createUser($nom, $prenom, $email, $mdp, $idRole);

        // Redirige l'Utilisateur vers la liste des Utilisateurs
        header('Location: /ctrl/user/user.php');
    }

    /** @Override */
    function getView()
    {
        return '/view/view/user-add.php';
    }
}

$ctrl = new AddUser();
$ctrl->execute();
