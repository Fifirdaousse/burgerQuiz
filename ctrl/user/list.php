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
    protected function isUserLogged()
    {
        return isset($_SESSION['user']);
    }

    protected function isRequiredUserLogged()
    {
        return true;
    }

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

    protected function requireRole()
    {
        return $admin = LibUser::get(10);
        $this->addViewArg('admin', $admin);
    }
}

$ctrl = new ListUser();
$ctrl->execute();




