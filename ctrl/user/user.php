<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
// require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

// use Monolog\Logger;

/** Détail d'un Article. */
class ListUser extends Ctrl
{
    /** @Override */
    // function log(): Logger
    // {
    //     return Log::getLog(__CLASS__);
    // }

    /** @Override */
    function getPageTitle()
    {
        return 'Liste des Utilisateurs : ';
    }

    /** @Override */
    function do()
    {
        $listUsers = LibUser::readAllUser();
        $this->addViewArg('listUsers', $listUsers);
    }

    /** @Override */
    function getView()
    {
        return '/view/user/gestionnaire.php';
    }
}

$ctrl = new ListUser();
$ctrl->execute();




