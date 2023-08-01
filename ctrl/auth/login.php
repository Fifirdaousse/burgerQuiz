<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
// require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

/** Traite le formulaire de login. */
class Login extends Ctrl
{
    /** @Override */
    // function log(): Logger
    // {
    //     return Log::getLog(__CLASS__);
    // }

    /** @Override */
    function getPageTitle()
    {
        return null;
    }

    /** @Override */
    function do()
    {
        // Quand l'Utilisateur est enregistré,
        // l'enregistre en session et le redirige vers la page d'accueil
        $user = $this->getUser();
        if ($user !== null) {

            $_SESSION['utilisateur_id'] = $user;

            header('Location: /');
            exit;
        }

        // Par défaut,
        // redirige l'Utilisateur vers la page de 'login' avec un message d'information
        $_SESSION['msg_info'] = 'Nom d\'utilisateur inconnu.';
        header('Location: /ctrl/auth/login-display.php');
    }

    /** Retourne l'éventuel Utilisateur connecté. */
    private function getUser()
    {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $user = LibUser::find($email, $mdp);

        return  $user;

        if (isset($_SESSION['utilisateur_id'])) {
            header("Location: /ctrl/quiz/list.php"); // Rediriger vers la page d'accueil ou toute autre page après la connexion
        }
    }

    /** @Override */
    function getView()
    {
        return null;
    }
}

$ctrl = new Login();
$ctrl->execute();

