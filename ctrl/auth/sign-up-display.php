<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;

/** Affiche le formualire de signup. */
class SignUpDisplay extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }


    /** @Override */
    function getPageTitle()
    {
        return 'Inscrivez-vous';
    }

    /** @Override */
    function getDescription()
    {
        return 'Session d\'inscription pour un nouvel utilisateur';
    }

    /** @Override */
    function do()
    {
        // Ne fait rien...
    }

    /** @Override */
    function getView()
    {
        return '/view/auth/sign-up.php';
    }
}

$ctrl = new SignUpDisplay();
$ctrl->execute();
