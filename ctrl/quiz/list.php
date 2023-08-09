<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/quiz/quiz.php');

use Monolog\Logger;

/** Liste les Questions. */
class Quiz extends Ctrl
{
    /** @Override */
    function log() : Logger {
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
        return 'QUIZ';
    }
    
    /** @Override */
    function getDescription()
    {
        return 'Liste de questions générés aléatoirement';
    }

    /** @Override */
    function do()
    {
        // Genere de maniere aleatoire les questions
        $numbers = implode(', ', LibQuiz::multyRandomNumber(1, 30));
       $listQuiz = LibQuiz::getQuestion($numbers);
        $this->addViewArg('listQuiz', $listQuiz);

    }

    /** @Override */
    function getView()
    {
        return '/view/quiz/list.php';
    }
}

$ctrl = new Quiz();
$ctrl->execute();
