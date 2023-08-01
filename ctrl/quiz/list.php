<!-- A MODIF -->

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
// require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/quiz/quiz.php');

// use Monolog\Logger;

/** Liste les Questions. */
class Quiz extends Ctrl
{
    /** @Override */
    // function log() : Logger {
    //     return Log::getLog(__CLASS__);
    // } 

    /** @Override */
    function getPageTitle()
    {
        return 'QUIZ';
    }

    /** @Override */
    function do()
    {
        // Liste les articles, et les expose à la vue
        $numbers = implode(', ', LibQuiz::multyRandomNumber(1, 30));
/*->*/        $listQuiz = LibQuiz::getQuestion($numbers);
        $this->addViewArg('listQuiz', $listQuiz);

        // $numbers = implode(', ', multyRandomNumber(1, 30));
            // $questions = getQuestion($numbers);
    }

    /** @Override */
    function getView()
    {
        return '/view/quiz/list.php';
    }
}

$ctrl = new Quiz();
$ctrl->execute();
