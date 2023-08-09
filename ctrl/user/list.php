<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

use Monolog\Logger;

/** Liste d'utilisateur. */
class ListUser extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    protected function isUserLogged()
    {
        return isset($_SESSION['user']);
    }

    /** @Override */
    protected function isRequiredUserLogged()
    {
        return true;
    }

    /** @Override */
    protected function requireRole()
    {
        return 10;
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Liste des Utilisateurs : ';
    }

    /** @Override */
    function getDescription()
    {
        return 'Liste d\'utilisateurs visible que par un gestionnaire';
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




