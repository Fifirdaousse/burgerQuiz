<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/quiz/quiz.php');

use Monolog\Logger;

/** Liste les Questions. */
class ListScore extends Ctrl
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
    function getPageTitle()
    {
        return 'Historique';
    }

    /** @Override */
    function getDescription()
    {
        return 'Historique des scores';
    }

    /** @Override */
    function do()
    {
        $listScore = LibQuiz::readAllScore();
        $this->addViewArg('listScore', $listScore);
    }

    /** @Override */
    function getView()
    {
        return '/view/user/historique.php';
    }
}

$ctrl = new ListScore();
$ctrl->execute();
